<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $docs []   = null;
        $docs = Document::getAll($connection);
        
        $result = [];
        
        foreach ($docs as $doc) {
            $result[] = [
                'documentID' => $doc->getDocumentID(),
                'ownerID' => $doc->getOwnerID(),
                'documentName' => $doc->getDocumentName(),
                'sphere' => $doc->getSphere(),
                'purpose' => $doc->getPurpose(),
                'docType' => $doc->getDocType(),
                'linkToFile' => $doc->getLinkToFile()
            ];
        }
        
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }
    
    $connection->close();
?>
