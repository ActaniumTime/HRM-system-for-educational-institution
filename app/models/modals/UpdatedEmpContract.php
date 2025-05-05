<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    try {
        $newDoc = new Document($connection);
        
        $uploadDir = __DIR__ . '../../../../Files/documents/';
    
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        $newFileName = null;
    
        if (isset($_FILES['confirmationFileModal2']) && $_FILES['confirmationFileModal2']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['confirmationFileModal2']['tmp_name'];
            $fileName = $_FILES['confirmationFileModal2']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
            $newFileName = uniqid('confirmationFile_', true) . '.' . $fileExtension;
            $destinationPath = $uploadDir . $newFileName;
    
            if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }
        }
    
        $data = $_POST;


        $newDoc = new Document($connection);
        $docID = $newDoc->addDocument(
            $data['employerID'],
            $data['docNameModal2'],
            $data['sphereModal2'],
            $data['purposeModal2'],
            $data['docTypeModal2'],
            $newFileName
        );

        $emp -> SetContractByID($data['employerID'], $docID );

        echo json_encode(['success' => true, 'message' => 'Employer added successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
    }
}
?>
