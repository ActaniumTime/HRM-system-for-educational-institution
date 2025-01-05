<?php

    class AccessLevel{
        private $connection;
        private $accessLevelID;
        private $accessLevelName;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($accessLevelID){
            $sql = "SELECT * FROM accesslevel WHERE accessLevelID = $accessLevelID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->accessLevelID = $row['accessLevelID'];
                $this->accessLevelName = $row['accessLevelName'];
            }
        }

        public function Show(){
            echo "Access Level ID: " . $this->accessLevelID . "<br>";
            echo "Access Level Name: " . $this->accessLevelName . "<br>";
        }

        public function addLevel(){
            $sql = "INSERT INTO accesslevel (accessLevelName) VALUES ('$this->accessLevelName')";
            if($this->connection->query($sql) === TRUE){
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function updateLevel(){
            $sql = "UPDATE accesslevel SET accessLevelName = '$this->accessLevelName' WHERE accessLevelID = $this->accessLevelID";
            if($this->connection->query($sql) === TRUE){
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function deleteLevel(){
            $sql = "DELETE FROM accesslevel WHERE accessLevelID = $this->accessLevelID";
            if($this->connection->query($sql) === TRUE){
                echo "Record deleted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        


    }
?>