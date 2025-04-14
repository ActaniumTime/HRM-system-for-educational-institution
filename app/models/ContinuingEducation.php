<?php

    class ContinuingEducation{
        private $connection;
        private $courseID;
        private $employerID;
        private $courseName;
        private $organizationName;
        private $startingDate;
        private $endingDate;
        private $currentStatus;
        private $documentID;
        private $certificateID;
        private $hours;
        private $credits;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($id){
            $query = "SELECT * FROM ContinuingEducation WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $this->courseID = $data['courseID'];
                $this->employerID = $data['employerID'];
                $this->courseName = $data['courseName'];
                $this->organizationName = $data['organizationName'];
                $this->startingDate = $data['startingDate'];
                $this->endingDate = $data['endingDate'];
                $this->currentStatus = $data['currentStatus'];
                $this->documentID = $data['documentID'];
                $this->hours = $data['hours'];
                $this->credits = $data['credits'];
                $this->certificateID = $data['certificateID'];
            }
        }

        public function addNewCourse($employerID, $courseName, $organizationName, $startingDate, $endingDate, $documentID, $hours, $credits) {
            $date = date('Y-m-d H:i:s');
            $currentStatus = "";
            if($date > $startingDate && $date < $endingDate){
                $currentStatus = "Ongoing";
            } else {
                if($date > $endingDate){
                    $currentStatus = "Completed";
                } else {
                    if($date < $startingDate){
                        $currentStatus = "Waiting";
                    }
                }
            }

            $this->employerID = $employerID;
            $this->courseName = $courseName;
            $this->organizationName = $organizationName;
            $this->startingDate = $startingDate;
            $this->endingDate = $endingDate;
            $this->currentStatus = $currentStatus;
            $this->documentID = $documentID;
            $this->hours = $hours;
            $this->credits = $credits;
        
            $query = "INSERT INTO ContinuingEducation (employerID, courseName, organizationName, startingDate, endingDate, currentStatus, documentID, hours, credits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
        
            if ($stmt === false) {
                die("Prepare failed: " . $this->connection->error);
            }
        
            $stmt->bind_param("isssssiii", $this->employerID, $this->courseName, $this->organizationName, $this->startingDate, $this->endingDate, $this->currentStatus, $this->documentID, $this->hours, $this->credits);
        
            if ($stmt->execute()) {
                $courseID = $stmt->insert_id;
                $stmt->close();
                return $courseID;
            } else {
                $stmt->close();
                return false;
            }
            
        }
        
        public function Show(){
            echo "Course ID: " . $this->courseID . "<br>";
            echo "Employer ID: " . $this->employerID . "<br>";
            echo "Course Name: " . $this->courseName . "<br>";
            echo "Organization Name: " . $this->organizationName . "<br>";
            echo "Starting Date: " . $this->startingDate . "<br>";
            echo "Ending Date: " . $this->endingDate . "<br>";
            echo "Current Status: " . $this->currentStatus . "<br>";
            echo "Document ID: " . $this->documentID . "<br>";
            echo "Sertificate ID: " . $this->certificateID . "<br>";
            echo "Hours: " . $this->hours . "<br>";
            echo "Credits: " . $this->credits . "<br>";
        }


        public function updateData(){
            $query = "UPDATE ContinuingEducation SET 
                employerID = ?, 
                courseName = ?, 
                organizationName = ?, 
                startingDate = ?, 
                endingDate = ?, 
                currentStatus = ?, 
                documentID = ?, 
                hours = ?, 
                credits = ?,
                certificateID = ? WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isssssiiiis", 
                $this->employerID, 
                $this->courseName, 
                $this->organizationName, 
                $this->startingDate, 
                $this->endingDate, 
                $this->currentStatus, 
                $this->documentID, 
                $this->hours, 
                $this->credits,
                $this->certificateID,
                $this->courseID
                );
            return $stmt->execute();
        }

        public function deleteCourse(){
            $query = "DELETE FROM ContinuingEducation WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->courseID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getAllCourses(){
            $query = "SELECT * FROM ContinuingEducation";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $courses = [];
            while($row = $result->fetch_assoc()){
                $course = new ContinuingEducation($this->connection);
                $course->courseID = $row['courseID'];
                $course->employerID = $row['employerID'];
                $course->courseName = $row['courseName'];
                $course->organizationName = $row['organizationName'];
                $course->startingDate = $row['startingDate'];
                $course->endingDate = $row['endingDate'];
                $course->currentStatus = $row['currentStatus'];
                $course->documentID = $row['documentID'];
                $course->certificateID = $row['certificateID'];
                $course->hours = $row['hours'];
                $course->credits = $row['credits'];

                $courses[] = $course;
            }

            return $courses;
        }

        public function setcertificateID($certificateID) {
            $this->certificateID = $certificateID;
        }

        public function setCourseID($courseID) {
            $this->courseID = $courseID;
        }

        public function setEmployerID($employerID) {
            $this->employerID = $employerID;
        }

        public function setCourseName($courseName) {
            $this->courseName = $courseName;
        }

        public function setOrganizationName($organizationName) {
            $this->organizationName = $organizationName;
        }

        public function setStartingDate($startingDate) {
            $this->startingDate = $startingDate;
        }

        public function setEndingDate($endingDate) {
            $this->endingDate = $endingDate;
        }

        public function setCurrentStatus($currentStatus) {
            $this->currentStatus = $currentStatus;
        }

        public function setDocumentID($documentID) {
            $this->documentID = $documentID;
        }

        public function setHours($hours) {
            $this->hours = $hours;
        }

        public function setCredits($credits) {
            $this->credits = $credits;
        }

        public function getCourseID() {
            return $this->courseID;
        }

        public function getEmployerID() {
            return $this->employerID;
        }

        public function getCourseName() {
            return $this->courseName;
        }

        public function getOrganizationName() {
            return $this->organizationName;
        }

        public function getStartingDate() {
            return $this->startingDate;
        }

        public function getEndingDate() {
            return $this->endingDate;
        }

        public function getCurrentStatus() {
            return $this->currentStatus;
        }

        public function getDocumentID() {
            return $this->documentID;
        }

        public function getHours() {
            return $this->hours;
        }

        public function getCredits() {
            return $this->credits;
        }

        public function getcertificateID() {
            return $this->certificateID;
        }

        public function getAllCoursesByIDs($IDs){
            $query = "SELECT * FROM ContinuingEducation WHERE courseID IN (" . implode(',', array_fill(0, count($IDs), '?')) . ")";
            $stmt = $this->connection->prepare($query);
            $types = str_repeat('i', count($IDs));
            $stmt->bind_param($types, ...$IDs);
            $stmt->execute();
            $result = $stmt->get_result();
            $courses = [];

            while($row = $result->fetch_assoc()){
                $course = new ContinuingEducation($this->connection);
                $course->courseID = $row['courseID'];
                $course->employerID = $row['employerID'];
                $course->courseName = $row['courseName'];
                $course->organizationName = $row['organizationName'];
                $course->startingDate = $row['startingDate'];
                $course->endingDate = $row['endingDate'];
                $course->currentStatus = $row['currentStatus'];
                $course->documentID = $row['documentID'];
                $course->certificateID = $row['certificateID'];
                $course->hours = $row['hours'];
                $course->credits = $row['credits'];

                array_push($courses, $course);
            }

            return  $courses;

        }
    }

?>