<?php

    class Continuingeducationhistory{
        private $connection;
        private $coursesID;
        private $employerID;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($id){
            $sql = "SELECT * FROM continuingeducationhistory WHERE coureID = $id";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->coursesID = $row['coursesID'];
                $this->employerID = $row['employerID'];
            }
        }

        public function Show(){
            echo "coursesID: " . $this->coursesID . "<br>";
            echo "employerID: " . $this->employerID . "<br>";
        }

        public function getCourseID(){
            return $this->coursesID;
        }

        public function getEmployerID(){
            return $this->employerID;
        }

        public function setCourseID($coursesID){
            $this->coursesID = $coursesID;
        }

        public function setEmployerID($employerID){
            $this->employerID = $employerID;
        }

        public function save(){
            $sql = "INSERT INTO continuingeducationhistory (coursesID, employerID) VALUES ($this->coursesID, $this->employerID)";
            $this->connection->query($sql);
        }

        public function update(){
            $sql = "UPDATE continuingeducationhistory SET coursesID = $this->coursesID, employerID = $this->employerID WHERE coursesID = $this->coursesID";
            $this->connection->query($sql);
        }

        public function delete(){
            $sql = "DELETE FROM continuingeducationhistory WHERE coursesID = $this->coursesID";
            $this->connection->query($sql);
        }

        
    }

?>