<?php
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';
    require_once __DIR__ . '/../../models/classes/Accreditation.php';

header('Content-Type: application/json');

try {
    // Проверка наличия accreditationID
    if (empty($_POST['accreditationID'])) {
        throw new Exception('Отсутствует accreditationID');
    }

    $accreditationID = intval($_POST['accreditationID']);
    $document = new Document($connection);
    $uploadedFiles = [];

    // Путь для сохранения файлов
    $uploadDir = __DIR__ . '/../../../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Обработка загруженных файлов
    foreach ($_FILES as $key => $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('doc_', true) . '.' . $fileExtension;
            $filePath = $uploadDir . $fileName;
            $publicPath = '/uploads/' . $fileName;

            // Перемещение файла в директорию
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                // Извлечение индекса документа из имени поля (например: file_1)
                $index = intval(str_replace('file_', '', $key));

                // Добавление записи о файле в базу данных
                $docID = $document->addDocument(
                    $_POST['ownerID'] ?? null,
                    $_POST["docName_$index"] ?? 'Без названия',
                    $_POST["sphere_$index"] ?? '',
                    $_POST["purpose_$index"] ?? '',
                    $_POST["docType_$index"] ?? 'Прочее',
                    $publicPath
                );

                $uploadedFiles[] = [
                    'index' => $index,
                    'fileName' => $fileName,
                    'documentID' => $docID
                ];
            } else {
                throw new Exception("Не удалось сохранить файл: {$file['name']}");
            }
        } elseif ($file['error'] !== UPLOAD_ERR_NO_FILE) {
            throw new Exception("Ошибка загрузки файла: {$file['name']}");
        }
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Файлы успешно загружены',
        'uploadedFiles' => $uploadedFiles
    ]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>