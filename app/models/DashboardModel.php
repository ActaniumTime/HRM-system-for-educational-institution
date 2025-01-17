<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../app/models/UserVerify.php';

    // Пример использования:
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        header('Content-Type: application/json');
        // echo json_encode($json, true);
        $tempEmp2 = new Employer($connection);
        $tempEmp2->loadByID($data['employerID']);
        if($tempEmp2->updateChangedFields($data) ){
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }

    }
    
?>
