<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../app/models/UserVerify.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        header('Content-Type: application/json');

        $tempEmp2 = new Employer($connection);
        $tempEmp2->loadByID($data['employerID']);
        $tempEmp2->updateChangedFields($data);
    }
    
?>
