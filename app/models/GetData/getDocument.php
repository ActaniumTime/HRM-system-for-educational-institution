<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../models/Database.php'; 
    require_once __DIR__ . '/../../../models/Position.php';
    require_once __DIR__ . '/../../../models/Document.php';
    
    header('Content-Type: application/json');


?>
