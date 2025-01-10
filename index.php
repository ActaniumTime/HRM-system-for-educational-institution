<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Подключаем необходимые файлы
require_once 'config/database.php';
require_once 'app/controllers/LoginController.php';

// Инициализируем контроллер и передаем подключение к базе данных
$controller = new LoginController($connection);
$controller->login(); // Вызываем метод для обработки логина

?>