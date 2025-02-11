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
            $flag = false;
            if ($stmt->execute())
                $flag = true;
            $stmt->close();
            return $flag;


        }

        public function editPosition($positionID, $positionName, $positionLevel, $positionRequirements, $salary){
            $this->positionID = $positionID;
            $this->positionName = $positionName;
            $this->positionLevel = $positionLevel;
            $this->positionRequirements = $positionRequirements;
            $this->salary = $salary;
            $query = "UPDATE Positions SET positionName = ?, positionLevel = ?, positionRequirements = ?, salary = ? WHERE positionID = ?";
            $stmt = $this->connection->prepare($query);

            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $this->connection->error);
            }

            $stmt->bind_param("sssii", $this->positionName, $this->positionLevel, $this->positionRequirements, $this->salary, $this->positionID);
            
            if ($stmt->execute()) {
                echo "Employer updated successfully!";
            } else {
                echo "Error updating employer: " . $stmt->error;
            }
        
            $stmt->close();
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

    }

?>