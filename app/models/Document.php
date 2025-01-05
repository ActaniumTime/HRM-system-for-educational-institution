<?php

    class Document{
        private $connection;
        private $documentID;
        private $ownerID;
        private $documentType;
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
                $this->documentType = $row['documentType'];
                $this->sphere = $row['sphere'];
                $this->purpose = $row['purpose'];
                $this->docType = $row['docType'];
                $this->linkToFile = $row['linkToFile'];
            }
        }

        public function Show(){
            echo "Document ID: " . $this->documentID . "<br>";
            echo "Owner ID: " . $this->ownerID . "<br>";
            echo "Document Type: " . $this->documentType . "<br>";
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

    }

?>