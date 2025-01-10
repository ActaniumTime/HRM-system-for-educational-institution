<?php

    session_start();

    $host = 'localhost';
    $port = 3306; // порт для MAMP
    $username = 'root';
    $password = 'root';
    $database = 'employeemanagement';
    $table = 'employers';

    // Подключение к базе данных
    $connection = new mysqli($host, $username, $password, $database, $port);

    // Проверка соединения
    if ($connection->connect_error) {
        die("Ошибка подключения: " . $connection->connect_error);
    }
    echo "Успешное подключение!";

?>
