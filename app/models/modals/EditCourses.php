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
        $flag1 = false; 
        $flag2 = false;

        if (isset($_FILES['confirmationFile_EditForm']) && $_FILES['confirmationFile_EditForm']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['confirmationFile_EditForm']['tmp_name'];
            $fileName = $_FILES['confirmationFile_EditForm']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
            $newFileName = uniqid('confirmationFile_EditForm_', true) . '.' . $fileExtension;
            $destinationPath = $uploadDir . $newFileName;
    
            if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }

            $flag1 = true;
        }

        if (isset($_FILES['confirmationFile_EditForm2']) && $_FILES['confirmationFile_EditForm2']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath2 = $_FILES['confirmationFile_EditForm2']['tmp_name'];
            $fileName2 = $_FILES['confirmationFile_EditForm2']['name'];
            $fileExtension2 = pathinfo($fileName2, PATHINFO_EXTENSION);
    
            $newFileName2 = uniqid('confirmationFile_EditForm2_', true) . '.' . $fileExtension2;
            $destinationPath2 = $uploadDir . $newFileName2;
    
            if (!move_uploaded_file($fileTmpPath2, $destinationPath2)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }
            $flag1 = true;
        }
    
        $data = $_POST;
    

        
        $courseID = $_POST['empID_EditForm'];
        $employerID = $_POST['empName_EditForm'];
        $courseName = $_POST['courseName_EditForm'];
        $organizationName = $_POST['organizationName_EditForm'];
        $startingDate = $_POST['startingDate_EditForm'];
        $endingDate = $_POST['endingDate_EditForm'];
        $hours = $_POST['hours_EditForm'];
        $credits = $_POST['credits_EditForm'];

        $newDoc1 = new Document($connection);
        $newDoc2 = new Document($connection);
        
        $tempCourse = new ContinuingEducation($connection);
        $tempCourse->loadByID($courseID);
        $tempCourse->setCourseName($courseName);
        $tempCourse->setOrganizationName($organizationName);
        $tempCourse->setStartingDate($startingDate);
        $tempCourse->setEndingDate($endingDate);
        $tempCourse->setHours($hours);
        $tempCourse->setCredits($credits);

        $tempCourse->setDocumentID();
        $tempCourse->setSertificateID();


        try{

            if($flag1 && $flag2){

                $docID1 = $newDoc1->addDocument($data['confirmationFile_EditForm'],
                    $data['docName_EditForm'], 
                    $data['sphere_EditForm'], 
                    $data['purpose_EditForm'], 
                    $data['docType_EditForm'], 
                    $newFileName
                );
                $docID2 = $newDoc2->addDocument($data['confirmationFile_EditForm2'],
                    $data['docName_EditForm2'], 
                    $data['sphere_EditForm2'], 
                    $data['purpose_EditForm2'], 
                    $data['docType_EditForm2'], 
                    $newFileName2
                );

                $tempCourse->updateCourse(
                    $courseID,
                    $employerID,
                    $courseName,
                    $organizationName,
                    $startingDate,
                    $endingDate,
                    $docID1,
                    $hours,
                    $credits,
                    $docID2
                );
            }
            else{
                if($flag1){
                    $docID1 = $newDoc1->addDocument($data['confirmationFile_EditForm'],
                        $data['docName_EditForm'], 
                        $data['sphere_EditForm'], 
                        $data['purpose_EditForm'], 
                        $data['docType_EditForm'], 
                        $newFileName
                    );
                    $tempCourse->updateCourse(
                        $courseID,
                        $employerID,
                        $courseName,
                        $organizationName,
                        $startingDate,
                        $endingDate,
                        $docID1,
                        $hours,
                        $credits,
                        null
                    );
                }
                else{
                    if($flag2){
                        $docID2 = $newDoc2->addDocument($data['confirmationFile_EditForm2'],
                            $data['docName_EditForm2'], 
                            $data['sphere_EditForm2'], 
                            $data['purpose_EditForm2'], 
                            $data['docType_EditForm2'], 
                            $newFileName2
                        );
                        $tempCourse->updateCourse(
                            $courseID,
                            $employerID,
                            $courseName,
                            $organizationName,
                            $startingDate,
                            $endingDate,
                            null,
                            $hours,
                            $credits,
                            $docID2
                        );
                    }
                    else{
                        $tempCourse->updateCourse(
                            $courseID,
                            $employerID,
                            $courseName,
                            $organizationName,
                            $startingDate,
                            $endingDate,
                            null,
                            $hours,
                            $credits
                        );
                    }
                }

            



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

