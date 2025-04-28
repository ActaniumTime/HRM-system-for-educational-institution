<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../models/UserVerify.php';
    
    $employerPage = new Employer($connection);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['emp_ID'])) {
            $empID = $_GET['emp_ID'];
            header("Location: /diploma/app/views/personalPage/personalPageByID.php?emp_ID=" . urlencode($empID));
            exit();
            
        } else {
            echo "ID пользователя не передан.";
        }
    }
    
?>
