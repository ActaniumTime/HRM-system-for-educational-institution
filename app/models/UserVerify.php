<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../config/database.php';

    require_once __DIR__ . '/../../app/models/Employer.php';

    $emp = new Employer($connection);
    $emp->loadByID($_SESSION['employer_ID']);

    echo "current ID employer : " . $_SESSION['employer_ID'];

?>