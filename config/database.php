<?php

    require_once 'app/models/Employer.php';

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

    // $sql = "SELECT * FROM $table";
    // $result = $connection->query($sql);

    // if($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["surname"] . "<br>";
    //     }
    // } else {
    //     echo "0 результатов";
    // }

    // $connection->close();

    // $empor = new Employer($connection);
    // $empor->loadByID(1);

?>
