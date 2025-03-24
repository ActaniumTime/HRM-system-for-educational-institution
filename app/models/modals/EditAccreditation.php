<?php
require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/classes/Accreditation.php';

header('Content-Type: application/json');

try {
    // Проверяем наличие обязательных данных
    if (empty($_POST['employerID']) || empty($_POST['accreditationID'])) {
        throw new Exception('Отсутствуют обязательные параметры: employerID или accreditationID');
    }

    $employerID = intval($_POST['employerID']);
    $accreditationID = intval($_POST['accreditationID']);

    // Декодируем JSON-данные
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

    // Получаем существующие documentYears
    $originalDocumentYears = $accreditation->getDocumentYears();

    // Устанавливаем основные данные аккредитации
    $accreditation->setEmployerID($employerID);
    $accreditation->setAccreditationPlan($accreditationPlan);
    $accreditation->setFinishDay($finishDay);
    $accreditation->setExperienceYears($currentYear);

    // Директория для загрузки файлов
    $uploadDir = __DIR__ . '../../../../Files/documents/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        throw new Exception('Не удалось создать директорию загрузки');
    }

    $addedDocuments = [];
    $updatedDocumentYears = [];

    // Обработка категорий и файлов
    foreach ($categories as $category) {
        $index = $category['index'];
        $file = $_FILES["file_{$index}"] ?? null;
        $year = $category['year'];
        $existingDocID = $originalDocumentYears[$year] ?? null;
        $newDocID = null;

        // Получаем данные документа из POST
        $docName = $_POST["docName_{$index}"] ?? '';
        $sphere = $_POST["sphere_{$index}"] ?? '';
        $purpose = $_POST["purpose_{$index}"] ?? '';
        $docType = $_POST["docType_{$index}"] ?? '';
        $publicPath = null;

        // Обрабатываем файл, если загружен новый
        if ($file) {
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

            // Загружен новый файл → создаём новый документ
            $newDocID = $document->addDocument($employerID, $docName, $sphere, $purpose, $docType, $publicPath);
            if (!$newDocID) {
                throw new Exception("Ошибка при добавлении документа");
            }
        }

        // Логика выбора документа для года
        if ($newDocID) {
            // Если загружен новый документ, используем его
            $updatedDocumentYears[$year] = $newDocID;
            $addedDocuments[] = $newDocID;
        } elseif ($existingDocID) {
            // Если нового нет, но был старый — сохраняем его
            $updatedDocumentYears[$year] = $existingDocID;
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
