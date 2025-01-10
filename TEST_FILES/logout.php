<?php

    require_once __DIR__ . '/../config/database.php';

    session_unset();
    session_destroy();
    setcookie('employer_ID', '', time() - 3600, '/');
    
    echo "Session destroyed";
    // header('Location: login.php');
    exit();
?>
