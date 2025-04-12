<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../models/UserVerify.php';
require_once __DIR__ . '/../../models/Document.php';
require_once __DIR__ . '/../../models/ContinuingEducation.php';
require_once __DIR__ . '/../../models/ContinuingEducationHistory.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $uploadDir = __DIR__ . '../../../../Files/documents/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $newFileName = null;
    $newFileName2 = null;
    $flag1 = false;
    $flag2 = false;

    if (isset($_FILES['confirmationFile_EditForm']) && $_FILES['confirmationFile_EditForm']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['confirmationFile_EditForm']['tmp_name'];
        $fileName = $_FILES['confirmationFile_EditForm']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('confirmationFile_EditForm_', true) . '.' . $fileExtension;
        $destinationPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file 1']);
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
            echo json_encode(['success' => false, 'message' => 'Failed to upload file 2']);
            exit;
        }

        $flag2 = true;
    }

    $courseID = $_POST['courseID_EditForm'];
    $employerID = $_POST['empID_EditForm'];
    $courseName = $_POST['courseName_EditForm'];
    $organizationName = $_POST['organizationName_EditForm'];
    $startingDate = $_POST['startingDate_EditForm'];
    $endingDate = $_POST['endingDate_EditForm'];
    $hours = $_POST['hours_EditForm'];
    $credits = $_POST['credits_EditForm'];

    try {
        $tempCourse = new ContinuingEducation($connection);
        $tempCourse->loadByID($courseID);

        if ($flag1) {
            $newDoc1 = new Document($connection);
            $docID1 = $newDoc1->addDocument(
                $employerID,
                $_POST['docName_EditForm'],
                $_POST['sphere_EditForm'],
                $_POST['purpose_EditForm'],
                $_POST['docType_EditForm'],
                $newFileName
            );
            $tempCourse->setDocumentID($docID1);
        }

        if ($flag2) {
            $newDoc2 = new Document($connection);
            $docID2 = $newDoc2->addDocument(
                $employerID,
                $_POST['docName_EditForm2'],
                $_POST['sphere_EditForm2'],
                $_POST['purpose_EditForm2'],
                $_POST['docType_EditForm2'],
                $newFileName2
            );
            $tempCourse->setcertificateID($docID2);
        }

        $tempCourse->setCourseName($courseName);
        $tempCourse->setOrganizationName($organizationName);
        $tempCourse->setStartingDate($startingDate);
        $tempCourse->setEndingDate($endingDate);
        $tempCourse->setHours($hours);
        $tempCourse->setCredits($credits);

        $tempCourse->updateData();

        echo json_encode(['success' => true, 'message' => 'Дані успішно збережено!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $e->getMessage()]);
    }
}