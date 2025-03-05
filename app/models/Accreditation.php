<?php 

class Accreditation{
    private $connection;
    private $accreditationID;
    private $employerID;
    private $accreditationPlan;
    private $documentYears;
    private $finishDay;
    private $experienceYears;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    public function loadByID($accreditationID){
        $sql = "SELECT * FROM accreditation WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $accreditationID);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $this->accreditationID = $row['id'];
            $this->employerID = $row['employerID'];
            $this->accreditationPlan = json_decode($row['accreditationPlan'], true) ?: [];
            $this->documentYears = json_decode($row['documentYears'], true) ?: [];
            $this->finishDay = json_decode($row['finishDay'], true) ?: [];
            $this->experienceYears = $row['experienceYears'];
        }
        $stmt->close();
    }
    

    public function Add(){
        $query = "INSERT INTO accreditation (
            employerID, 
            accreditationPlan, 
            documentYears, 
            finishDay, 
            experienceYears
        ) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);

        $accreditationPlanJson = json_encode($this->accreditationPlan);
        $documentYearsJson = json_encode($this->documentYears);
        
        // Убедимся, что finishDay содержит только корректные строки
        if (!is_array($this->finishDay)) {
            $this->finishDay = [];
        }
        foreach ($this->finishDay as $key => $value) {
            if (!is_string($key) || !is_string($value)) {
                unset($this->finishDay[$key]);
            }
        }
        
        $finishDayJson = json_encode($this->finishDay);
        
        $stmt->bind_param('ssssi', 
            $this->employerID, 
            $accreditationPlanJson, 
            $documentYearsJson,  
            $finishDayJson, 
            $this->experienceYears
        );

        $stmt->execute();
        $stmt->close();
    }

    public function updatedata(){
        $query = "UPDATE accreditation SET 
            employerID = ?, 
            accreditationPlan = ?, 
            documentYears = ?, 
            finishDay = ?, 
            experienceYears = ? 
            WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $accreditationPlanJson = json_encode($this->accreditationPlan);
        $documentYearsJson = json_encode($this->documentYears);
        
        // Убедимся, что finishDay содержит только корректные строки
        if (!is_array($this->finishDay)) {
            $this->finishDay = [];
        }
        foreach ($this->finishDay as $key => $value) {
            if (!is_string($key) || !is_string($value)) {
                unset($this->finishDay[$key]);
            }
        }
        
        $finishDayJson = json_encode($this->finishDay);
        
        $stmt->bind_param('ssssii', 
            $this->employerID, 
            $accreditationPlanJson, 
            $documentYearsJson,  
            $finishDayJson, 
            $this->experienceYears,
            $this->accreditationID
        );

        $stmt->execute();
        $stmt->close();
    }
    

    public function Show(){
        echo "Accreditation ID: " . $this->accreditationID . "<br>";
        echo "Employer ID: " . $this->employerID . "<br>";
        echo "Accreditation Plan: " . json_encode($this->accreditationPlan) . "<br>";
        echo "Document Years: " . json_encode($this->documentYears) . "<br>";
        echo "Finish Day: " . json_encode($this->documentYears) . "<br>";
        echo "Expirience Years: " . $this->experienceYears . "<br>";
    }

    public function setEmployerID($employerID){
        $this->employerID = $employerID;
    }

    public function setAccreditationPlan($accreditationPlan){
        $this->accreditationPlan = $accreditationPlan;
    }

    public function setDocumentYears($documentYears){
        $this->documentYears = $documentYears;
    }

    public function setFinishDay($finishDay){
        $this->finishDay = $finishDay;
    }

    public function setexperienceYears($experienceYears){
        $this->experienceYears = $experienceYears;
    }

    public function getAccreditationID(){
        return $this->accreditationID;
    }

    public function getEmployerID(){
        return $this->employerID;
    }

    public function getAccreditationPlan(){
        return $this->accreditationPlan;
    }

    public function getDocumentYears(){
        return $this->documentYears;
    }

    public function getFinishDay(){
        return $this->finishDay;
    }

    public function getexperienceYears(){
        return $this->experienceYears;
    }
}

?>