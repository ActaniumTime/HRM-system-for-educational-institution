<?php

    class Document{
        private $connection;
        private $documentID;
        private $ownerID;
        private $documentName;
        private $sphere;
        private $purpose;
        private $docType;
        private $linkToFile;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($documentID){
            $sql = "SELECT * FROM document WHERE documentID = $documentID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->documentID = $row['documentID'];
                $this->ownerID = $row['ownerID'];
                $this->documentName = $row['documentName'];
                $this->sphere = $row['sphere'];
                $this->purpose = $row['purpose'];
                $this->docType = $row['docType'];
                $this->linkToFile = $row['linkToFile'];
            }
        }

        public function Show(){
            echo "Document ID: " . $this->documentID . "<br>";
            echo "Owner ID: " . $this->ownerID . "<br>";
            echo "Document Name: " . $this->documentName . "<br>";
            echo "Sphere: " . $this->sphere . "<br>";
            echo "Purpose: " . $this->purpose . "<br>";
            echo "Document Type: " . $this->docType . "<br>";
            echo "Link to file: " . $this->linkToFile . "<br>";
        }

        public function showOwner(){
            $sql = "SELECT * FROM employers WHERE employerID = $this->ownerID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "Owner: " . $row['name'] . " " . $row['surname'] . $row['fathername'] . $row['employerID'] . "<br>";
            }
        }

        public function addDocument($ownerID, $documentName, $sphere, $purpose, $docType, $linkToFile) {
            $this->ownerID = $ownerID;
            $this->documentName = $documentName;
            $this->sphere = $sphere;
            $this->purpose = $purpose;
            $this->docType = $docType;
            $this->linkToFile = $linkToFile;
        
            $query = "INSERT INTO Document (ownerID, documentName, sphere, purpose, docType, linkToFile) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
        
            if ($stmt === false) {
                die("Prepare failed: " . $this->connection->error);
            }
        
            $stmt->bind_param("isssss", $this->ownerID, $this->documentName, $this->sphere, $this->purpose, $this->docType, $this->linkToFile);
        
            if ($stmt->execute()) {
                echo "Document added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        
            $stmt->close();
        }
        
    }

?>