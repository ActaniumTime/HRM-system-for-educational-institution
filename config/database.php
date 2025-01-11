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
    echo '
    <div id="success-toast" style="position: fixed; top: 20px; right: 20px; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); font-family: Arial, sans-serif; font-size: 14px; z-index: 9999; transition: opacity 0.5s;">
        Connection successful!
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById("success-toast");
            toast.style.opacity = "0";
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    </script>
    ';

?>
