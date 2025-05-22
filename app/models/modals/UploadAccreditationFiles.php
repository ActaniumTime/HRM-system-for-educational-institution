<?php
require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/classes/Accreditation.php';

header('Content-Type: application/json');

try {
    if (empty($_POST['accreditationID']) || empty($_POST['ownerID'])) {
        throw new Exception('Отсутствуют обязательные параметры: accreditationID или ownerID');
    }

    $accreditationID = intval($_POST['accreditationID']);
    $ownerID = intval($_POST['ownerID']);
    $document = new Document($connection);

    $uploadedFiles = [];
    $uploadDir = __DIR__ . '/../../../../Files/documents/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
        throw new Exception('Не удалось создать директорию загрузки');
    }

    foreach ($_FILES as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Ошибка загрузки файла: {$file['name']}, код: {$file['error']}");
        }

        if (!preg_match('/^file_(\d+)$/', $key, $matches)) {
            throw new Exception("Некорректное имя файла: $key");
        }
        $index = intval($matches[1]);

        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('doc_', true) . '.' . $fileExtension;
        $filePath = $uploadDir . $fileName;
        $publicPath = '/Files/documents/' . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            throw new Exception("Не удалось сохранить файл: {$file['name']}");
        }


        $docName = $_POST["docName_$index"] ?? 'Без названия';
        $sphere = $_POST["sphere_$index"] ?? '';
        $purpose = $_POST["purpose_$index"] ?? '';
        $docType = $_POST["docType_$index"] ?? 'Прочее';


        $docID = $document->addDocument($ownerID, $docName, $sphere, $purpose, $docType, $publicPath);
        if (!$docID) {
            throw new Exception("Ошибка при добавлении документа в базу.");
        }

        $uploadedFiles[] = [
            'index' => $index,
            'fileName' => $fileName,
            'documentID' => $docID
        ];
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