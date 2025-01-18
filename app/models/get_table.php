<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../app/models/UserVerify.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $employers = Employer::getAll($connection);
        
        $result = [];
        
        foreach ($employers as $employer) {
            $result[] = [
                'employerID' => $employer->getEmployerID(),
                'accessLevelID' => $employer->getAccessLevelID(),
                'name' => $employer->getName(),
                'surname' => $employer->getSurname(),
                'fathername' => $employer->getFathername(),
                'birthday' => $employer->getBirthday(),
                'gender' => $employer->getGender(),
                'passportID' => $employer->getPassportID(),
                'homeAddress' => $employer->getHomeAddress(),
                'email' => $employer->getEmail(),
                'phoneNumber' => $employer->getPhoneNumber(),
                'department' => $employer->getDepartment(),
                'dateAccepted' => $employer->getDateAccepted(),
                'currentStatus' => $employer->getCurrentStatus(),
                'dateFired' => $employer->getDateFired(),
                'admissionBasis' => $employer->getAdmissionBasis(),
                'employmentType' => $employer->getEmploymentType(),
                'avatar' => $employer->getAvatar()
            ];
        }
        
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }
    
    $connection->close();
?>
