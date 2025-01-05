<?php

    class Order{
        private $connection;
        private $orderID;
        private $date;
        private $orderType;
        private $employerID;
        private $linkToFile;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Show(){
            echo "orderID: " . $this->orderID . "<br>";
            echo "date: " . $this->date . "<br>";
            echo "orderType: " . $this->orderType . "<br>";
            echo "employerID: " . $this->employerID . "<br>";
            echo "linkToFile: " . $this->linkToFile . "<br>";
        }

        public function loadByID($id){
            $query = "SELECT * FROM orders WHERE orderID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $this->orderID = $data['orderID'];
                $this->date = $data['date'];
                $this->orderType = $data['orderType'];
                $this->employerID = $data['employerID'];
                $this->linkToFile = $data['linkToFile'];
            }
        }

        //подумать над тем, как реализовать систему добавления и обновления файлов.

        // public function addNewOrder(){
        //     $query = "INSERT INTO Orders (date, orderType, employerID, linkToFile) VALUES (?, ?, ?, ?)";
        //     $stmt = $this->connection->prepare($query);
        //     $stmt->bind_param("ssis", $this->date, $this->orderType, $this->employerID, $this->linkToFile);
        //     $stmt->execute();
        // }

        // public function updateOrder(){
        //     $query = "UPDATE Orders SET date = ?, orderType = ?, employerID = ?, linkToFile = ? WHERE orderID = ?";
        //     $stmt = $this->connection->prepare($query);
        //     $stmt->bind_param("ssisi", $this->date, $this->orderType, $this->employerID, $this->linkToFile, $this->orderID);
        //     $stmt->execute();
        // }

        // public function deleteOrder(){
        //     $query = "DELETE FROM Orders WHERE orderID = ?";
        //     $stmt = $this->connection->prepare($query);
        //     $stmt->bind_param("i", $this->orderID);
        //     $stmt->execute();
        // }
    }

?>