<?php

    class EmployerPositions{
        private $connection;
        private $employerID;
        private $positionID;

        public function addEmployerPosition($employerID, $positionID){
            $this->employerID = $employerID;
            $this->positionID = $positionID;
            $quary = "INSERT INTO employerpositions (employerID, positionID) VALUES ('$this->employerID', '$this->positionID')";
            $stmt = $this->connection->prepare($quary);
            if ($stmt->execute()) {
                echo "Employers positions added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }


        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($employerID){
            $sql = "SELECT * FROM employerpositions WHERE employerID = $employerID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->employerID = $row['employerID'];
                $this->positionID = $row['positionID'];
            }
        }

        public function Show(){
            echo "Employer ID: " . $this->employerID . "<br>";
            echo "Position ID: " . $this->positionID . "<br>";
        }

        public function addPosition(){
            $sql = "INSERT INTO employerpositions (employerID, positionID) VALUES ('$this->employerID', '$this->positionID')";
            if($this->connection->query($sql) === TRUE){
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function updatePosition(){
            $sql = "UPDATE employerpositions SET employerID = '$this->employerID', positionID = '$this->positionID' WHERE employerID = $this->employerID";
            if($this->connection->query($sql) === TRUE){
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function deletePosition(){
            $sql = "DELETE FROM employerpositions WHERE employerID = $this->employerID";
            if($this->connection->query($sql) === TRUE){
                echo "Record deleted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        
    }

?>