<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';
    require_once __DIR__ . '/../../models/classes/Accreditation.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!isset($_GET['docArray'])) {
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }
        
        $result = [];

        $tempArr = json_decode($_GET['docArray'], true);
        
        
        foreach ($docs as $doc) {
            $ownerID = $doc->getOwnerID();
            $ownerName = $testEmp->getEmpNameByID($ownerID) ?? "???"; // Обработка ошибок
            $result[] = [
                'documentID' => $doc->getDocumentID(),
                'ownerName' => $ownerName,
                'documentName' => $doc->getDocumentName(),
                'sphere' => $doc->getSphere(),
                'purpose' => $doc->getPurpose(),
                'docType' => $doc->getDocType(),
                'linkToFile' => $doc->getLinkToFile()
            ];
        }
        header('Content-Type: application/json');
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }
    
    $connection->close();
?>