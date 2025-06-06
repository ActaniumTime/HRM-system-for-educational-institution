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
        
            $stmt->execute();
            $documentID = $stmt->insert_id;
        
            $stmt->close();
            return $documentID;
        }

        public function deleteDocument($id){
            if(isset($id)){
                $query = "DELETE FROM document WHERE documentID = ?";
                $stmt = $this->connection->prepare($query);
                $stmt -> bind_param('i', $id);
                if($stmt->execute()){
                    $stmt->close();
                    return true;
                } else {
                    return false;
                }
                $stmt->close();
            }
        }

        public static function getAll($connection) {
            $sql = "SELECT * FROM document";
            $result = $connection->query($sql);
            $documents = [];
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $document = new Document($connection);
                    $document->setDocumentID($row['documentID']);
                    $document->setOwnerID($row['ownerID']);
                    $document->setDocumentName($row['documentName']);
                    $document->setSphere($row['sphere']);
                    $document->setPurpose($row['purpose']);
                    $document->setDocType($row['docType']);
                    $document->setLinkToFile($row['linkToFile']);
                    $documents[] = $document;
                }
            }
        
            return $documents;
        }
        
        public function updateDoc() {
            $query = "UPDATE document SET ownerID = ?, 
            documentName = ?, sphere = ?, 
            purpose = ?, docType = ?, 
            linkToFile = ? WHERE documentID = ?";
            $stmt = $this->connection->prepare($query);

            if ($stmt === false) {
            die("Prepare failed: " . $this->connection->error);
            }

            $stmt->bind_param("isssssi", 
            $this->ownerID,
            $this->documentName, 
            $this->sphere, 
            $this->purpose, 
            $this->docType, 
            $this->linkToFile, 
            $this->documentID);

            $flag = false;
            if ($stmt->execute())
                $flag = true;
            $stmt->close();
            return $flag;
        }
        
        public function getAllDocumentsByOwnerID($ownerID) {
            $sql = "SELECT * FROM document WHERE ownerID = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("i", $ownerID);
            $stmt->execute();
            $result = $stmt->get_result();
            $documents = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $document = new Document($this->connection);
                    $document->setDocumentID($row['documentID']);
                    $document->setOwnerID($row['ownerID']);
                    $document->setDocumentName($row['documentName']);
                    $document->setSphere($row['sphere']);
                    $document->setPurpose($row['purpose']);
                    $document->setDocType($row['docType']);
                    $document->setLinkToFile($row['linkToFile']);
                    $documents[] = $document;
                }
            }

            return $documents;
        }

        public function getDocumentID() {
            return $this->documentID;
        }

        public function getOwnerID() {
            return $this->ownerID;
        }

        public function getDocumentName() {
            return $this->documentName;
        }

        public function getSphere() {
            return $this->sphere;
        }

        public function getPurpose() {
            return $this->purpose;
        }

        public function getDocType() {
            return $this->docType;
        }

        public function getLinkToFile() {
            return $this->linkToFile;
        }

        public function setDocumentID($documentID) {
            $this->documentID = $documentID;
        }

        public function setOwnerID($ownerID) {
            $this->ownerID = $ownerID;
        }

        public function setDocumentName($documentName) {
            $this->documentName = $documentName;
        }

        public function setSphere($sphere) {
            $this->sphere = $sphere;
        }

        public function setPurpose($purpose) {
            $this->purpose = $purpose;
        }

        public function setDocType($docType) {
            $this->docType = $docType;
        }

        public function setLinkToFile($linkToFile) {
            $this->linkToFile = $linkToFile;
        }
    }

?>