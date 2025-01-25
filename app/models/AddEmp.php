<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../app/models/UserVerify.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    
    $uploadDir = __DIR__ . '/../../Files/photos/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Инициализация переменных
    $newFileName = null;

    // Обработка файла
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('avatar_', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
            exit;
        }
    }

    // Чтение JSON-данных
    $data = $_POST;

    // Валидация
    $requiredFields = [
        'accessLevelID', 'name', 'surname', 'fathername', 'birthday',
        'gender', 'passportID', 'homeAddress', 'email', 'phoneNumber',
        'department', 'dateAccepted', 'currentStatus', 'admissionBasis', 'employmentType'
    ];
    

    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            echo json_encode(['success' => false, 'message' => "Missing field: $field"]);
            exit;
        }
    }

    // Сохранение данных
    try {
        $tempEmp = new Employer($connection);
        $tempEmp->addEmployer(
            $data['accessLevelID'],
            $data['password'] ?? '',
            $data['name'],
            $data['surname'],
            $data['fathername'],
            $data['birthday'],
            $data['gender'],
            $data['passportID'],
            $data['homeAddress'],
            $data['email'],
            $data['phoneNumber'],
            $data['department'],
            $data['dateAccepted'],
            $data['currentStatus'],
            $data['dateFired'] ?? null,
            $data['admissionBasis'],
            $data['employmentType'],
            $newFileName
        );

        echo json_encode(['success' => true, 'message' => 'Employer added successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
    }
}
?>
