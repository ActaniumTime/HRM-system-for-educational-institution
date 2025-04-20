<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Position.php';
    require_once __DIR__ . '/../../models/EmployerPositions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (!isset($_GET['employerID']) || !is_numeric($_GET['employerID'])) {
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $employerID = intval($_GET['employerID']);
        $employerPosition = new EmployerPosition($connection);
        $PosIDsArray = $employerPosition->getByEmployerID($employerID);
        $PosArray = [];
        $tempPosition = new Position($connection);
        foreach($PosIDsArray as $PosID) {
            $tempPosition->loadByID($PosID);
            $PosArray[] = [
                'positionID' => $tempPosition->getPositionID(),
                'positionName' => $tempPosition->getPositionName(),
                'positionLevel'=> $tempPosition->getPositionLevel(),
                'positionRequirements' => $tempPosition->getPositionRequirements(),
                'salary' => $tempPosition->getSalary(),
                'documentID' => $tempPosition->getDocumentID(),
                'empID' =>$employerID
            ];
        }

        header('Content-Type: application/json');
        $json = json_encode($PosArray);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }
    
    $connection->close();
?>