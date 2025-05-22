<?php

    session_start();

    $host = 'localhost';
    $port = 3306; // port for MAMP 
    $username = 'root';
    $password = 'root';
    $database = 'employeemanagement';
    $table = 'employers';

    // Connect to the database
    $connection = new mysqli($host, $username, $password, $database, $port);

    if ($connection->connect_error) {
        die("Ошибка подключения: " . $connection->connect_error);
    }

?>
