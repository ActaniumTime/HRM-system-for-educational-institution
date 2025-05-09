<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Content-Type: application/json');

    $uploadDir = __DIR__ . '../../../../Files/documents/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $newFileName = null;

    if (isset($_FILES['linkToFile']) && $_FILES['linkToFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['linkToFile']['tmp_name'];
        $fileName = $_FILES['linkToFile']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('linkToFile_', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
            exit;
        }
    }

    $data = $_POST;

    try{
        $newDoc = new Document($connection);
        $newDoc->addDocument(
            $emp->getEmployerID(),
            $data['docName'],
            $data['sphere'],
            $data['purpose'],
            $data['docType'],
            $newFileName
        );
        if ($newDoc) {
            echo json_encode(['success' => true, 'message' => 'Position added successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save position']);
        }
    } catch (Exception $e){
        echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
    }

}

?>