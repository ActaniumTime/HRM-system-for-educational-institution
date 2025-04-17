<?php

class EmployerPosition {
    private $connection;
    private $employerPositionID;
    private $employerID;
    private $positionID;
    private $documentID;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function loadByID($id) {
        $sql = "SELECT * FROM employer_positions WHERE employerPositionID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $this->employerPositionID = $row['employerPositionID'];
            $this->employerID = $row['employerID'];
            $this->positionID = $row['positionID'];
            $this->documentID = $row['documentID'];
        }
        $stmt->close();
    }

    public function add() {
        $query = "INSERT INTO employer_positions (employerID, positionID, documentID) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iii", $this->employerID, $this->positionID, $this->documentID);
        $stmt->execute();
        $stmt->close();
    }

    public function update() {
        $query = "UPDATE employer_positions SET employerID = ?, positionID = ?, documentID = ? WHERE employerPositionID = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("iiii", $this->employerID, $this->positionID, $this->documentID, $this->employerPositionID);
        $stmt->execute();
        $stmt->close();
    }

    public function delete() {
        $query = "DELETE FROM employer_positions WHERE employerPositionID = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $this->employerPositionID);
        $stmt->execute();
        $stmt->close();
    }

    public function getAll() {
        $sql = "SELECT * FROM employer_positions";
        $result = $this->connection->query($sql);
        $list = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $item = new EmployerPosition($this->connection);
                $item->employerPositionID = $row['employerPositionID'];
                $item->employerID = $row['employerID'];
                $item->positionID = $row['positionID'];
                $item->documentID = $row['documentID'];
                $list[] = $item;
            }
        }
        return $list;
    }
    
    public function getByEmployerID($empID) {
        $sql = "SELECT * FROM employer_positions WHERE employerID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $empID);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $item = new EmployerPosition($this->connection);
                $item->employerPositionID = $row['employerPositionID'];
                $item->employerID = $row['employerID'];
                $item->positionID = $row['positionID'];
                $item->documentID = $row['documentID'];
                $list[] = $item;
            }
        }
        $stmt->close();
        return $list;
    }

    // Getters
    public function getEmployerPositionID() {
        return $this->employerPositionID;
    }

    public function getEmployerID() {
        return $this->employerID;
    }

    public function getPositionID() {
        return $this->positionID;
    }

    public function getDocumentID() {
        return $this->documentID;
    }

    // Setters
    public function setEmployerID($employerID) {
        $this->employerID = $employerID;
    }

    public function setPositionID($positionID) {
        $this->positionID = $positionID;
    }

    public function setDocumentID($documentID) {
        $this->documentID = $documentID;
    }

    public function show() {
        echo "Employer Position ID: " . $this->employerPositionID . "<br>";
        echo "Employer ID: " . $this->employerID . "<br>";
        echo "Position ID: " . $this->positionID . "<br>";
        echo "Document ID: " . $this->documentID . "<br>";
    }
}

?>
