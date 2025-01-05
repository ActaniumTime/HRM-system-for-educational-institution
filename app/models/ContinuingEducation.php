<?php

    class ContinuingEducation{
        private $connection;
        private $courseID;
        private $employerID;
        private $courseName;
        private $orgaminzationName;
        private $startingDate;
        private $endingDate;
        private $currnetStatus;
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
            echo "orgaminzationName: " . $this->orgaminzationName . "<br>";
            echo "startingDate: " . $this->startingDate . "<br>";
            echo "endingDate: " . $this->endingDate . "<br>";
            echo "currnetStatus: " . $this->currnetStatus . "<br>";
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
                $this->orgaminzationName = $data['orgaminzationName'];
                $this->startingDate = $data['startingDate'];
                $this->endingDate = $data['endingDate'];
                $this->currnetStatus = $data['currnetStatus'];
                $this->documentID = $data['documentID'];
                $this->hours = $data['hours'];
                $this->credits = $data['credits'];
            }
        }

        public function addNewCourse(){
            $query = "INSERT INTO ContinuingEducation (employerID, courseName, orgaminzationName, startingDate, endingDate, currnetStatus, documentID, hours, credits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isssssiii", $this->employerID, $this->courseName, $this->orgaminzationName, $this->startingDate, $this->endingDate, $this->currnetStatus, $this->documentID, $this->hours, $this->credits);
            $stmt->execute();
        }

        public function updateCourse(){
            $query = "UPDATE ContinuingEducation SET employerID = ?, courseName = ?, orgaminzationName = ?, startingDate = ?, endingDate = ?, currnetStatus = ?, documentID = ?, hours = ?, credits = ? WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isssssiiii", $this->employerID, $this->courseName, $this->orgaminzationName, $this->startingDate, $this->endingDate, $this->currnetStatus, $this->documentID, $this->hours, $this->credits, $this->courseID);
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