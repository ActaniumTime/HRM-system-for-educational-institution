<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Position.php';
require_once __DIR__ . '/../../models/EmployerPositions.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/enc.php';

$enc = new Enigma();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $password = $_POST['adminPassword_positionDeleteForm'] ?? null;
    $employerID = $_POST['EmployerID_positionDeleteForm'] ?? null;
    $docName = $_POST['docName_positionDeleteForm'] ?? null;
    $sphere = $_POST['sphere_positionDeleteForm'] ?? null;
    $purpose = $_POST['purpose_positionDeleteForm'] ?? null;
    $docType = $_POST['docType_positionDeleteForm'] ?? null;
    $positionID = $_POST['PositionID_positionDeleteForm'] ?? null;

    $currentUserId = $_SESSION['employer_ID'] ?? null;

    if (!$currentUserId) {
        echo json_encode(['success' => false, 'message' => 'Unauthorized.']);
        exit;
    }

    $query = $connection->prepare("SELECT password FROM employers WHERE employerID = ?");
    $query->bind_param('i', $currentUserId);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid user session.']);
        exit;
    }

    $user = $result->fetch_assoc();

    // Проверка пароля
    if ($enc->encrypt($user['password']) !== $password) {
        echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
        exit;
    }

    $uploadDir = __DIR__ . '/../../../Files/documents/';

    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
        echo json_encode(['success' => false, 'message' => 'Failed to create upload directory']);
        exit;
    }

    $newFileName = null;
    $documentID = null;

    if (!empty($_FILES['confirmationFile_positionDeleteForm']['tmp_name']) && $_FILES['confirmationFile_positionDeleteForm']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['confirmationFile_positionDeleteForm']['tmp_name'];
        $fileName = $_FILES['confirmationFile_positionDeleteForm']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('confirmationFile_', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
            exit;
        }

        // Добавление документа
        $newDoc = new Document($connection);
        $documentID = $newDoc->addDocument(
            $employerID,
            $docName,
            $sphere,
            $purpose,
            $docType,
            $newFileName
        );
    } else {
        echo json_encode(['success' => false, 'message' => 'No document provided']);
        exit;
    }

    try {
        // Загрузка и удаление позиции
        $newPos = new EmployerPosition($connection);
        $newPos->loadByID($positionID, $employerID);

        if ($newPos->delete()) {
            echo json_encode(['success' => true, 'message' => 'Position deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete position']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
