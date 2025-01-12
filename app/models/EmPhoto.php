<?php

class EmPhoto {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Получить путь к фотографии для отображения аватара пользователя
    public function getAvatarPath($employerID) {
        $sql = "SELECT photoPath FROM emphoto WHERE employerID = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $employerID);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row ? $row['photoPath'] : null; // Возвращает путь к фото или null, если запись не найдена
        } else {
            throw new Exception("Ошибка получения пути к аватару: " . $stmt->error);
        }
    }
    
    // Добавить новую запись
    public function addPhoto($employerID, $photoPath) {
        $sql = "INSERT INTO emphoto (employerID, photoPath) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("is", $employerID, $photoPath);

        if ($stmt->execute()) {
            return $this->connection->insert_id; // Возвращает ID добавленной записи
        } else {
            throw new Exception("Ошибка добавления фото: " . $stmt->error);
        }
    }

    public function getPhotoByID($photoID) {
        $sql = "SELECT * FROM emphoto WHERE photoID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $photoID);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Возвращает ассоциативный массив
        } else {
            throw new Exception("Ошибка получения фото: " . $stmt->error);
        }
    }

    // Получить все фото сотрудника
    public function getPhotosByEmployerID($employerID) {
        $sql = "SELECT * FROM emphoto WHERE employerID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $employerID);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC); // Возвращает массив записей
        } else {
            throw new Exception("Ошибка получения фото сотрудника: " . $stmt->error);
        }
    }
}

?>
