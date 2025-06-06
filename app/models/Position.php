<?php

    class Position{
        private $connection;
        private $positionID;
        private $positionName;
        private $positionLevel;
        private $positionRequirements;
        private $salary;
        private $documentID;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Show(){
            echo "positionID: " . $this->positionID . "<br>";
            echo "positionName: " . $this->positionName . "<br>";
            echo "positionLevel: " . $this->positionLevel . "<br>";
            echo "positionRequirements: " . $this->positionRequirements . "<br>";
            echo "salary: " . $this->salary . "<br>";
        }

        public function loadByID($id){
            $query = "SELECT * FROM Positions WHERE positionID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $this->positionID = $data['positionID'];
                $this->positionName = $data['positionName'];
                $this->positionLevel = $data['positionLevel'];
                $this->positionRequirements = $data['positionRequirements'];
                $this->salary = $data['salary'];
                $this->documentID = $data['documentID'];
            }
        }

        public function addNewPosition($positionName, $positionLevel, $positionRequirements, $salary, $documentID){
            $this->positionName = $positionName;
            $this->positionLevel = $positionLevel;
            $this->positionRequirements = $positionRequirements;
            $this->salary = $salary;
            $this->documentID = $documentID;
            
            $query = "INSERT INTO Positions (positionName, positionLevel, positionRequirements, salary, documentID) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sssis", $this->positionName, $this->positionLevel, $this->positionRequirements, $this->salary, $this->documentID);
            $stmt->execute();
            $positionID = $stmt->insert_id;
            $stmt->close();
            return $positionID;

        }

        public static function getAll($connection){
            $query = "SELECT * FROM positions";
            $result = $connection->query($query);
            $positions = [];

            while($row = $result->fetch_assoc()){
                $position = new Position(connection: $connection);
                $position->positionID = $row['positionID'];
                $position->positionName = $row['positionName'];
                $position->positionLevel = $row['positionLevel'];
                $position->positionRequirements = $row['positionRequirements'];
                $position->salary = $row['salary'];
                $position->documentID = $row['documentID'];

                $positions [] = $position;
            }
            return $positions;
        }

        public function showAllPositions(){
            $query = "SELECT * FROM Positions";
            $result = $this->connection->query($query);

            $positions = [];
            while ($row = $result->fetch_assoc()) {
                $positions[] = $row;
            }
            return $positions;
        }


        public function getAllPosition($connection){
            $query = "SELECT * FROM positions";
            $result = $connection->query($query);
            $positions = [];
            while($row = $result->fetch_assoc()){
                $position = new Position($connection);
                $position->positionID = $row['positionID'];
                $position->positionName = $row['positionName'];
                $position->positionLevel = $row['positionLevel'];
                $position->positionRequirements = $row['positionRequirements'];
                $position->salary = $row['salary'];
                $position->documentID = $row['documentID'];

                $positions [] = $position;
            }
            return $positions;
        }

        public function getAllPositionBy($connection, $empIDs){
            $query = "SELECT * FROM positions WHERE positionID IN (" . implode(',', array_fill(0, count($empIDs), '?')) . ")";
            $stmt = $connection->prepare($query);
            $stmt->bind_param(str_repeat('i', count($empIDs)), ...$empIDs);
            $stmt->execute();
            $result = $stmt->get_result();
            $positions = [];

            while ($row = $result->fetch_assoc()) {
                $position = new Position($connection);
                $position->positionID = $row['positionID'];
                $position->positionName = $row['positionName'];
                $position->positionLevel = $row['positionLevel'];
                $position->positionRequirements = $row['positionRequirements'];
                $position->salary = $row['salary'];
                $position->documentID = $row['documentID'];

                $positions[] = $position;
            }
            return $positions;
        }

        public function deletePosition($id){
            $query = "DELETE FROM positions WHERE positionID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $stmt->close();
                return true;
            }
            else{
                return false;
            }
            $stmt->close();
        }

        public function updatePosition() {
            if (!$this->positionID) {
            throw new Exception("Position ID is required for update.");
            }
        
            $query = "UPDATE positions SET 
                positionName = ?, 
                positionLevel = ?, 
                positionRequirements = ?, 
                salary = ?, 
                documentID = COALESCE(?, documentID)
                  WHERE positionID = ?";
        
            $stmt = $this->connection->prepare($query);
        
            if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
            }
        
            $stmt->bind_param(
            "sssiii",
            $this->positionName,
            $this->positionLevel,
            $this->positionRequirements,
            $this->salary,
            $this->documentID,
            $this->positionID
            );
        
            $flag = false;
            if ($stmt->execute())
                $flag = true;
            $stmt->close();
            return $flag;
        }

        public function setPos($positionName, $positionLevel, $positionRequirements, $salary, $documentID){
            $this->positionName = $positionName;
            $this->positionLevel = $positionLevel;
            $this->positionRequirements = $positionRequirements;
            $this->salary = $salary;
            $this->documentID = $documentID;
        }
        

        public function getPositionID() {
            return $this->positionID;
        }

        public function getPositionName() {
            return $this->positionName;
        }

        public function getPositionLevel() {
            return $this->positionLevel;
        }

        public function getPositionRequirements() {
            return $this->positionRequirements;
        }

        public function getSalary() {
            return $this->salary;
        }

        public function getDocumentID() {
            return $this->documentID;
        }

        public function setPositionID($positionID) {
            $this->positionID = $positionID;
        }

        public function setPositionName($positionName) {
            $this->positionName = $positionName;
        }

        public function setPositionLevel($positionLevel) {
            $this->positionLevel = $positionLevel;
        }

        public function setPositionRequirements($positionRequirements) {
            $this->positionRequirements = $positionRequirements;
        }

        public function setSalary($salary) {
            $this->salary = $salary;
        }

        public function setDocumentID($documentID) {
            $this->documentID = $documentID;
        }
    }

?>