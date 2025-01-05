<?php

    class Position{
        private $connection;
        private $positionID;
        private $positionName;
        private $positionLevel;
        private $positionRequirements;
        private $salary ;

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

        public function addNewPosition(){
            $query = "INSERT INTO Positions (positionName, positionLevel, positionRequirements, salary) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sisi", $this->positionName, $this->positionLevel, $this->positionRequirements, $this->salary);
            $stmt->execute();
        }

        public function updatePosition(){
            $query = "UPDATE Positions SET positionName = ?, positionLevel = ?, positionRequirements = ?, salary = ? WHERE positionID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sisii", $this->positionName, $this->positionLevel, $this->positionRequirements, $this->salary, $this->positionID);
            $stmt->execute();
        }

        public function deletePosition(){
            $query = "DELETE FROM Positions WHERE positionID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->positionID);
            $stmt->execute();
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