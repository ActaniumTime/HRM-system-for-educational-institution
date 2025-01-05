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

        public function addNewVocation(){
            $query = "INSERT INTO Vocations (employerID, vocationType, startingDate, endingDate, currentStatus, orderID) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issssi", $this->employerID, $this->vocationType, $this->startingDate, $this->endingDate, $this->currentStatus, $this->orderID);
            $stmt->execute();
        }

        public function updateVocation(){
            $query = "UPDATE Vocations SET employerID = ?, vocationType = ?, startingDate = ?, endingDate = ?, currentStatus = ?, orderID = ? WHERE vocationID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issssii", $this->employerID, $this->vocationType, $this->startingDate, $this->endingDate, $this->currentStatus, $this->orderID, $this->vocationID);
            $stmt->execute();
        }

        public function deleteVocation(){
            $query = "DELETE FROM Vocations WHERE vocationID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->vocationID);
            $stmt->execute();
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