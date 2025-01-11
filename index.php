<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'config/database.php';
    require_once 'app/controllers/LoginController.php';

    $controller = new LoginController($connection);
    $controller->login(); 



?>