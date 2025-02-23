<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $data = $_POST;

    try {
        $newDoc = new Document($connection);
        $newDoc ->loadByID($data['editDocID']);
        $newDoc->setDocumentName($data['editDocName']);
        $newDoc->setSphere($data['editSphere']);
        $newDoc->setPurpose($data['editPurpose']);
        $newDoc->setDocType($data['editDocType']);

        $check = $newDoc->updateDoc();

        if ($check) {
            echo json_encode(['success' => true, 'message' => 'Document updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save Document']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
