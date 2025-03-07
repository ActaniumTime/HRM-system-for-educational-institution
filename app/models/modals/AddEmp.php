<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/Accreditation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    
    $uploadDir = __DIR__ . '../../../../Files/photos/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $newFileName = null;

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

    $data = $_POST;

    $requiredFields = [
        'accessLevelID', 'name', 'surname', 'fathername', 'birthday',
        'gender', 'passportID', 'homeAddress', 'email', 'phoneNumber',
        'department', 'dateAccepted', 'currentStatus', 'employmentType'
    ];
    


    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            echo json_encode(['success' => false, 'message' => "Missing field: $field"]);
            exit;
        }
    }

    try {

        $tempEmp = new Employer($connection);
        $employID = $tempEmp->addEmployer(
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
            $data['admissionBasis'] ?? null,
            $data['employmentType'],
            $newFileName
        );

        $newDoc = new Document($connection);
        
        $uploadDir2 = __DIR__ . '../../../../Files/documents/';
    
        if (!is_dir($uploadDir2)) {
            mkdir($uploadDir2, 0755, true);
        }
    
        $newFileName2 = null;

        if (isset($_FILES['confirmationFile']) && $_FILES['confirmationFile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath2 = $_FILES['confirmationFile']['tmp_name'];
            $fileName = $_FILES['confirmationFile']['name'];
            $fileExtension2 = pathinfo($fileName, PATHINFO_EXTENSION);
    
            $newFileName2 = uniqid('confirmationFile_', true) . '.' . $fileExtension2;
            $destinationPath2 = $uploadDir2 . $newFileName2;

            if (!move_uploaded_file($fileTmpPath2, $destinationPath2)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }
        }
    

        $newDoc = new Document($connection);
        $newDoc->addDocument(
            $employID,
            $data['docName'],
            $data['sphere'],
            $data['purpose'],
            $data['docType'],
            $newFileName2
        );


        $currentYear = date('Y');
        $lastYear = $currentYear - $data['categoryAge'];
        $empAccred = new Accreditation($connection);
        $empAccred->setEmployerID($employID);

        // Определяем первый возможный год аккредитации
        if ($data['categoryAge'] < 3) {
            $commingAccreditationYear = $currentYear + (3 - $data['categoryAge']);
        } else {
            $commingAccreditationYear = $lastYear + 3;
        }

        // Ограничиваем перенос на 5 лет максимум
        $commingAccreditationYear = min($commingAccreditationYear, $lastYear + 5);

        // Для 4-й категории проверка каждые 5 лет
        if ($data['category'] == 4) {
            $commingAccreditationYear = $lastYear + 5;
        }


        // function checkDate($lastAccreditationYear, $expirienceYear){
        //     $currentYear = date('Y');
        //     $newAccreditationYear = $lastAccreditationYear + $expirienceYear;
        //     if ($newAccreditationYear < $currentYear && $expirienceYear < 5) {
        //         return $newAccreditationYear+= $currentYear - $newAccreditationYear;
        //     }
        //     return $newAccreditationYear;
        // }

        // $newerAccreditationYear = checkDate($lastYear, $data['categoryAge']);

        switch ($data['category']) {
            case 1:
                $accreditationPlan = [
                    'Спеціаліст' => $lastYear,
                    'Спеціаліст другої категорії' => $commingAccreditationYear,
                    'Спеціаліст першої категорії' => $commingAccreditationYear + 3,
                    'Спеціаліст вищої категорії' => $commingAccreditationYear + 6,
                ];
                break;
            case 2:
                $accreditationPlan = [
                    'Спеціаліст' => null,
                    'Спеціаліст другої категорії' => $lastYear,
                    'Спеціаліст першої категорії' => $commingAccreditationYear,
                    'Спеціаліст вищої категорії' => $commingAccreditationYear + 3,
                ];
                break;
            case 3:
                $accreditationPlan = [
                    'Спеціаліст' => null,
                    'Спеціаліст другої категорії' => null,
                    'Спеціаліст першої категорії' => $lastYear,
                    'Спеціаліст вищої категорії' => $commingAccreditationYear,
                ];
                break;
            case 4:
                $accreditationPlan = [
                    'Спеціаліст' => null,
                    'Спеціаліст другої категорії' => null,
                    'Спеціаліст першої категорії' => null,
                    'Спеціаліст вищої категорії' => $lastYear,
                ];
                break;
        }
        
        switch($data['category']){
            case 1 : $empAccred->setDocumentYears([
                $lastYear=>null,
                $commingAccreditationYear=>null,
                $commingAccreditationYear + 3=>null, 
                $commingAccreditationYear + 6=>null,
            ]); break;
            case 2 : $empAccred->setDocumentYears([
                null=>null,
                $lastYear=>null,
                $commingAccreditationYear=>null, 
                $commingAccreditationYear + 3=>null,
            ]); break;
            case 3 : $empAccred->setDocumentYears([
                null=>null,
                null=>null,
                $lastYear=>null, 
                $commingAccreditationYear=>null,
            ]); break;
            case 4 : $empAccred->setDocumentYears([
                null=>null,
                null=>null,
                null=>null,
                $lastYear=>null,
            ]); break;
        }

        $empAccred->setAccreditationPlan($accreditationPlan);
        $empAccred->setexperienceYears($data['categoryAge']);
        $empAccred->AddAccreditation();



        echo json_encode(['success' => true, 'message' => 'Employer added successfully']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
    }
}
?>
