<?php

    class Continuingeducationhistory{
        private $connection;
        private $courseID;
        private $employerID;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($id){
            $query = "SELECT * FROM continuingeducationhistory WHERE courseID = ?";
            $stmt = $this->connection->prepare($query); 
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->courseID = $row['courseID'];
                $this->employerID = $row['employerID'];
            }
        }
        

        public function addNewCourse($courseID, $employerID) {
            $this->courseID = $courseID;
            $this->employerID = $employerID;
        
            $query = "INSERT INTO continuingeducationhistory (courseID, employerID) VALUES (?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ii", $this->courseID, $this->employerID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function Show(){
            echo "courseID: " . $this->courseID . "<br>";
            echo "employerID: " . $this->employerID . "<br>";
        }

        public function getCourseID(){
            return $this->courseID;
        }

        public function getEmployerID(){
            return $this->employerID;
        }

        public function setCourseID($courseID){
            $this->courseID = $courseID;
        }

        public function setEmployerID($employerID){
            $this->employerID = $employerID;
        }

        public function save(){
            $sql = "INSERT INTO continuingeducationhistory (courseID, employerID) VALUES ($this->courseID, $this->employerID)";
            $this->connection->query($sql);
        }

        public function update(){
            $sql = "UPDATE continuingeducationhistory SET courseID = $this->courseID, employerID = $this->employerID WHERE courseID = $this->courseID";
            $this->connection->query($sql);
        }

        public function delete(){
            $query = "DELETE FROM continuingeducationhistory WHERE courseID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->courseID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }
        
    }

?>