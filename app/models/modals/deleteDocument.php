<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';
    require_once __DIR__ . '/../enc.php';

    $enc = new Enigma();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);
        $password = $data['password'] ?? null;

        $currentUserId = $_SESSION['employer_ID'] ?? null;

        if(!$currentUserId){
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
        if (!$password === $enc->encrypt($user['password'])) {
            echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
            exit;
        }

        $document = new Document($connection);
        if($document->deleteDocument($data['documentID'])){
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete document.']);
        }
    }
?>