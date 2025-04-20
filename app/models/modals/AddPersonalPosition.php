<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Position.php';
require_once __DIR__ . '/../../models/EmployerPositions.php';
require_once __DIR__ . '/../../models/Document.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $data = $_POST;

    $uploadDir = __DIR__ . '../../../../Files/documents/';

    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
        echo json_encode(['success' => false, 'message' => 'Failed to create upload directory']);
        exit;
    }

    $newFileName = null;
    $documentID = null;

    if (!empty($_FILES['confirmationFile_positionAddForm']['tmp_name']) && $_FILES['confirmationFile_positionAddForm']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['confirmationFile_positionAddForm']['tmp_name'];
        $fileName = $_FILES['confirmationFile_positionAddForm']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('confirmationFile_positionAddForm_', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
            exit;
        }

        $newDoc = new Document($connection);
        $documentID = $newDoc->addDocument(
            $data['employerID_positionAddForm'],
            $data['docName_positionAddForm'],
            $data['sphere_positionAddForm'],
            $data['purpose_positionAddForm'],
            $data['docType_positionAddForm'],
            $newFileName
        );
    } else {
        echo json_encode(['success' => false, 'message' => 'No document provided']);
        exit;
    }

    try {
        $newPos = new Position($connection);

        $newPos->loadByID($data['empID_positionAddForm']);
        $newPos->setDocumentID($documentID);

        $positionID = $newPos->getPositionID();

        $newEmpPos = new EmployerPosition($connection);
        $flag = false;
        if(        
            $newEmpPos->AddNewPosition(
            $data['employerID_positionAddForm'],
            $positionID,
            $documentID)
        ) {
            $flag = true;
        } else {
            $flag = false;
        }

        if ($flag) {
            echo json_encode(['success' => true, 'message' => 'Position added successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save position']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
