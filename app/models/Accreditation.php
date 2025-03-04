<?php 

    class Accreditation{
        private $connection;
        private $accreditationID;
        private $employerID;
        private $accreditationPlan;
        private $documentYears;
        private $finishDay;
        private $expirienceYears;
        
        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($accreditationID){
            $sql = "SELECT * FROM accreditation WHERE accreditationID = $accreditationID";
            $result = $this->connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $this->accreditationID = $row['accreditationID'];
                $this->employerID = $row['employerID'];
                $this->accreditationPlan = $row['accreditationPlan'];
                $this->documentYears = $row['documentYears'];
                $this->finishDay = $row['finishDay'];
                $this->expirienceYears = $row['expirienceYears'];
            }
        }

        public function Add(){
            $qury = "INSERT INTO accreditation (
            employerID, 
            accreditationPlan, 
            documentYears, 
            finishDay, 
            expirienceYears) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($qury);
            
            $stmt->bind_param('isiii', 
            $this->employerID, 
            $this->accreditationPlan, 
            $this->documentYears, 
            $this->finishDay, 
            $this->expirienceYears);

            $stmt->execute();
            $stmt->close();
        }


    }

?>