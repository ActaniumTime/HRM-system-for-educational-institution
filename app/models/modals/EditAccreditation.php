<?php
require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/classes/Accreditation.php';

header('Content-Type: application/json');

try {
    // Проверка наличия обязательных данных
    if (empty($_POST['employerID']) || empty($_POST['accreditationID'])) {
        throw new Exception('Отсутствуют обязательные параметры: employerID или accreditationID');
    }

    $employerID = intval($_POST['employerID']);
    $accreditationID = intval($_POST['accreditationID']);

    // Проверяем наличие данных
    $accreditationPlan = json_decode($_POST['accreditationPlan'], true) ?? [];
    $documentYears = json_decode($_POST['documentYears'], true) ?? [];
    $finishDay = json_decode($_POST['finishDay'], true) ?? [];
    $categories = json_decode($_POST['categories'], true) ?? [];
    $currentYear = intval($_POST['currentYear'] ?? 0);

    // Проверяем корректность данных
    if (!$accreditationPlan || !$categories) {
        throw new Exception('Некорректные или неполные данные');
    }

    // Инициализация объектов
    $accreditation = new Accreditation($connection);
    $document = new Document($connection);

    // Загружаем существующую аккредитацию
    $accreditation->loadByID($accreditationID);

    // Устанавливаем основные данные аккредитации
    $accreditation->setEmployerID($employerID);
    $accreditation->setAccreditationPlan($accreditationPlan);
    $accreditation->setDocumentYears($documentYears);
    $accreditation->setFinishDay($finishDay);
    $accreditation->setExperienceYears($currentYear);

    // Директория для загрузки файлов
    $uploadDir = __DIR__ . '../../../../Files/documents/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        throw new Exception('Не удалось создать директорию загрузки');
    }

    $addedDocuments = [];
    $updatedDocumentYears = $documentYears;

    // Обработка категорий и файлов
    foreach ($categories as $category) {
        $index = $category['index'];
        $docID = $category['docID'] ?? null;

        // Если файл присутствует, обрабатываем его
        if (isset($_FILES["file_{$index}"])) {
            $file = $_FILES["file_{$index}"];
            if ($file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Ошибка загрузки файла: {$file['name']}, код: {$file['error']}");
            }

            // Генерируем уникальное имя файла
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('doc_', true) . '.' . $fileExtension;
            $filePath = $uploadDir . $fileName;
            $publicPath = "{$fileName}";

            // Перемещаем загруженный файл
            if (!move_uploaded_file($file['tmp_name'], $filePath)) {
                throw new Exception("Не удалось сохранить файл: {$file['name']}");
            }

            // Если нет docID, создаём новый документ
            if (!$docID) {
                $docName = $_POST["docName_{$index}"] ?? 'Без названия';
                $sphere = $_POST["sphere_{$index}"] ?? '';
                $purpose = $_POST["purpose_{$index}"] ?? '';
                $docType = $_POST["docType_{$index}"] ?? 'Прочее';

                $docID = $document->addDocument($employerID, $docName, $sphere, $purpose, $docType, $publicPath);
                if (!$docID) {
                    throw new Exception("Ошибка при добавлении документа в базу");
                }

                $addedDocuments[] = $docID;
            }
        }

        // Если создан новый документ, обновляем documentYears
        if ($docID && !empty($category['year'])) {
            $updatedDocumentYears[$category['year']] = $docID;
        }
    }

    // Обновляем аккредитацию с новыми documentYears
    $accreditation->setDocumentYears($updatedDocumentYears);
    $accreditation->updateData();

    // Возвращаем успешный результат
    echo json_encode([
        'status' => 'success',
        'message' => 'Аккредитация и документы успешно обновлены',
        'accreditationID' => $accreditation->getAccreditationID(),
        'addedDocumentIDs' => $addedDocuments,
        'updatedDocumentYears' => $updatedDocumentYears
    ]);
} catch (Exception $e) {
    // Обработка ошибок
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>