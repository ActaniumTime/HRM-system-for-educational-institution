<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../config/database.php';

    require_once __DIR__ . '/../../app/models/Employer.php';

    if (isset($_COOKIE['employer_ID']) && !isset($_SESSION['employer_ID'])) {
        $_SESSION['employer_ID'] = $_COOKIE['employer_ID'];
    }

    if (!isset($_SESSION['employer_ID'])) {
         echo "User not logged in. Redirecting to login page...";
         header('Location: G:\Job\MAMP\htdocs\diploma\index.php');
         exit();
    }

    $emp = new Employer($connection);
    $emp->loadByID($_SESSION['employer_ID']);

    $testEmp = new Employer($connection);
    
?>