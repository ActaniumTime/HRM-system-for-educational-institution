<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../models/UserVerify.php';
    require_once __DIR__ . '/../../models/Document.php';
    require_once __DIR__ . '/../../models/ContinuingEducation.php';
    require_once __DIR__ . '/../../models/ContinuingEducationHistory.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        header('Content-Type: application/json');
    
        $uploadDir = __DIR__ . '../../../../Files/documents/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        $newFileName = null;
    
        if (isset($_FILES['linkToFile']) && $_FILES['linkToFile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['linkToFile']['tmp_name'];
            $fileName = $_FILES['linkToFile']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
            $newFileName = uniqid('linkToFile_', true) . '.' . $fileExtension;
            $destinationPath = $uploadDir . $newFileName;
    
            if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }
        }
    
        $data = $_POST;
    
        try{
            $newDoc = new Document($connection);
            $courses = new ContinuingEducation($connection);
            $empCourses = new ContinuingEducationHistory($connection);
            $flag = $empCourses->addNewCourse(            
                $courses->addNewCourse(
                    $data['empID_AddForm'],
                    $data['courseName_AddForm'],
                    $data['organizationName_AddForm'],
                    $data['startingDate_AddForm'],
                    $data['endingDate_AddForm'],
                    $newDoc->addDocument(
                        $data['empID_AddForm'],
                        $data['docName_AddForm'],
                        $data['sphere_AddForm'],
                        $data['purpose_AddForm'],
                        $data['docType_AddForm'],
                        $newFileName
                    ),
                    $data['hours_AddForm'],
                    $data['credits_AddForm']
                ), 
                $data['empID_AddForm']
            );
            if ($flag) {
                echo json_encode(['success' => true, 'message' => 'Courses added successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to save courses']);
            }
        } catch (Exception $e){
            echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
        }

    }

?>

