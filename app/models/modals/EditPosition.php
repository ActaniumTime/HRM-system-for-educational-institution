<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Position.php';
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

    if (!empty($_FILES['confirmationEditFile']['tmp_name']) && $_FILES['confirmationEditFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['confirmationEditFile']['tmp_name'];
        $fileName = $_FILES['confirmationEditFile']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('confirmationEditFile', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
            exit;
        }

        $newDoc = new Document($connection);
        $documentID = $newDoc->addDocument(
            $emp->getEmployerID(),
            $data['docName'],
            $data['sphere'],
            $data['purpose'],
            $data['docType'],
            $newFileName
        );
    } else {
        echo json_encode(['success' => false, 'message' => 'No document provided']);
        exit;
    }

    try {
        $newPos = new Position($connection);
        $newPos ->loadByID($data['editPositionID']);
        $newPos -> setPos(
            $data["positionName"],
            $data["positionLevel"],
            $data["positionRequirements"],
            $data['positionSalary'],
            $documentID
        );
        $check = $newPos->updatePosition();

        if ($check) {
            echo json_encode(['success' => true, 'message' => 'Position updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save position']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
