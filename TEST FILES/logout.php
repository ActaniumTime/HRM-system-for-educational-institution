<?php

    set_include_path(__DIR__ . '/../');

    session_destroy();
    header('Location: login.php');
    exit();
?>
