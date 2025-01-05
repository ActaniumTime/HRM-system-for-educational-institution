<?php

    class Employmentcontracts{
        private $connection;
        private $employerID;
        private $orderID;
        private $documentID;
        private $contractType;
        private $dateOfSigning;
        private $termOfValidity;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($employerID){
            $sql = "SELECT * FROM employmentcontracts WHERE employerID = $employerID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->employerID = $row['employerID'];
                $this->orderID = $row['orderID'];
                $this->documentID = $row['documentID'];
                $this->contractType = $row['contractType'];
                $this->dateOfSigning = $row['dateOfSigning'];
                $this->termOfValidity = $row['termOfValidity'];
            }
        }

        public function Show(){
            echo "Employer ID: " . $this->employerID . "<br>";
            echo "Order ID: " . $this->orderID . "<br>";
            echo "Document ID: " . $this->documentID . "<br>";
            echo "Contract Type: " . $this->contractType . "<br>";
            echo "Date of Signing: " . $this->dateOfSigning . "<br>";
            echo "Term of Validity: " . $this->termOfValidity . "<br>";
        }

        public function addContract(){
            $sql = "INSERT INTO employmentcontracts (employerID, orderID, documentID, contractType, dateOfSigning, termOfValidity) VALUES ('$this->employerID', '$this->orderID', '$this->documentID', '$this->contractType', '$this->dateOfSigning', '$this->termOfValidity')";
            if($this->connection->query($sql) === TRUE){
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function updateContract(){
            $sql = "UPDATE employmentcontracts SET employerID = '$this->employerID', orderID = '$this->orderID', documentID = '$this->documentID', contractType = '$this->contractType', dateOfSigning = '$this->dateOfSigning', termOfValidity = '$this->termOfValidity' WHERE employerID = $this->employerID";
            if($this->connection->query($sql) === TRUE){
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }

        public function deleteContract(){
            $sql = "DELETE FROM employmentcontracts WHERE employerID = $this->employerID";
            if($this->connection->query($sql) === TRUE){
                echo "Record deleted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }


    }

?>