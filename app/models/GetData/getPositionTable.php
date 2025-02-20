<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Position.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $positions []   = null;
        $positions = Position::getAll($connection);
        
        $result = [];
        
        foreach ($positions as $position) {
            $result[] = [
                'positionID' => $position->getPositionID(),
                'positionName' => $position->getPositionName(),
                'positionLevel' => $position->getPositionLevel(),
                'positionRequirements' => $position->getPositionRequirements(),
                'salary' => $position->getSalary(),
                'documentID' => $position->getDocumentID(),
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
