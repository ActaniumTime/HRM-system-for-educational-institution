<?php

    class Vocations{
        private $connection;
        private $vocationID;
        private $employerID;
        private $vocationType;
        private $startingDate;
        private $endingDate;
        private $currentStatus;
        private $orderID;
        

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Show(){
            echo "vocationID: " . $this->vocationID . "<br>";
            echo "employerID: " . $this->employerID . "<br>";
            echo "vocationType: " . $this->vocationType . "<br>";
            echo "startingDate: " . $this->startingDate . "<br>";
            echo "endingDate: " . $this->endingDate . "<br>";
            echo "currentStatus: " . $this->currentStatus . "<br>";
            echo "orderID: " . $this->orderID . "<br>";
        }

        public function loadByID($id){
            $query = "SELECT * FROM vocation WHERE vocationID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $this->vocationID = $data['vocationID'];
                $this->employerID = $data['employerID'];
                $this->vocationType = $data['vocationType'];
                $this->startingDate = $data['startingDate'];
                $this->endingDate = $data['endingDate'];
                $this->currentStatus = $data['currentStatus'];
                $this->orderID = $data['orderID'];
            }
        }


        public function addVocation($employerID, $vocationType, $startingDate, $endingDate, $currentStatus, $orderID) {
            $this->employerID = $employerID;
            $this->vocationType = $vocationType;
            $this->startingDate = $startingDate;
            $this->endingDate = $endingDate;
            $this->currentStatus = $currentStatus;
            $this->orderID = $orderID ?: null; // Если $orderID не задан, передаём NULL
        
            $query = "INSERT INTO Vocation (employerID, vocationType, startingDate, endingDate, currentStatus, orderID) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
        
            if ($stmt === false) {
                die("Prepare failed: " . $this->connection->error);
            }
        
            $stmt->bind_param(
                "issssi", 
                $this->employerID, 
                $this->vocationType, 
                $this->startingDate, 
                $this->endingDate, 
                $this->currentStatus, 
                $this->orderID
            );
        
            if ($stmt->execute()) {
                echo "Vocation added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        
            $stmt->close();
        }
        

        public function showAllVocations(){
            $query = "SELECT * FROM Vocations";
            $result = $this->connection->query($query);
        }

        public function showVocationsByEmployerID($employerID){
            $query = "SELECT * FROM Vocations WHERE employerID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $employerID);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        public function showVocationsByOrderID($orderID){
            $query = "SELECT * FROM Vocations WHERE orderID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $orderID);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        public function showVocationsByType($vocationType){
            $query = "SELECT * FROM Vocations WHERE vocationType = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $vocationType);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        public function showVocationsByStatus($currentStatus){
            $query = "SELECT * FROM Vocations WHERE currentStatus = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $currentStatus);
            $stmt->execute();
            $result = $stmt->get_result();
        }

        public function showVocationsByDate($startingDate, $endingDate){
            $query = "SELECT * FROM Vocations WHERE startingDate = ? AND endingDate = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ss", $startingDate, $endingDate);
            $stmt->execute();
            $result = $stmt->get_result();
        }


    }

?>