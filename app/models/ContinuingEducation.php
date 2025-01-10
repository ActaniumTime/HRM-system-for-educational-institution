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
        private $hours;
        private $credits;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Show(){
            echo "courseID: " . $this->courseID . "<br>";
            echo "employerID: " . $this->employerID . "<br>";
            echo "courseName: " . $this->courseName . "<br>";
            echo "organizationName: " . $this->organizationName . "<br>";
            echo "startingDate: " . $this->startingDate . "<br>";
            echo "endingDate: " . $this->endingDate . "<br>";
            echo "currentStatus: " . $this->currentStatus . "<br>";
            echo "documentID: " . $this->documentID . "<br>";
            echo "hours: " . $this->hours . "<br>";
            echo "credits: " . $this->credits . "<br>";
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
            }
        }


        public function addNewCourse($employerID, $courseName, $organizationName, $startingDate, $endingDate, $currentStatus, $documentID, $hours, $credits) {
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
                echo "Course added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
        

        public function updateCourse(){
            $query = "UPDATE ContinuingEducation SET employerID = ?, courseName = ?, organizationName = ?, startingDate = ?, endingDate = ?, currentStatus = ?, documentID = ?, hours = ?, credits = ? WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isssssiiii", $this->employerID, $this->courseName, $this->organizationName, $this->startingDate, $this->endingDate, $this->currentStatus, $this->documentID, $this->hours, $this->credits, $this->courseID);
            $stmt->execute();
        }

        public function deleteCourse(){
            $query = "DELETE FROM ContinuingEducation WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->courseID);
            $stmt->execute();
        }

    }

?>