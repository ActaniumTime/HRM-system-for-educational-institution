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
    

    public function AddAccreditation(){
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
    
    public function GetAll($connection){
        $sql = "SELECT * FROM accreditation";
        $result = $connection->query($sql);
        $accreditationList = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $accreditation = new Accreditation($connection);
                $accreditation->accreditationID = $row['id'];
                $accreditation->employerID = $row['employerID'];
                $accreditation->accreditationPlan = json_decode($row['accreditationPlan'], true) ?: [];
                $accreditation->documentYears = json_decode($row['documentYears'], true) ?: [];
                $accreditation->finishDay = json_decode($row['finishDay'], true) ?: [];
                $accreditation->experienceYears = $row['experienceYears'];
                $accreditationList[] = $accreditation;
            }
        }
        return $accreditationList;
    }
    
    public function isAccreditedYear($year) {
        return in_array($year, $this->accreditationPlan);
    }
    
    public function isAccreditedYearList($connection, $year) {
        $query = "SELECT * FROM accreditation";
        $result = $connection->query($query);
        $accreditationList = [];
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $accreditation = new Accreditation($connection);
                $accreditation->accreditationID = $row['id'];
                $accreditation->employerID = $row['employerID'];
                $accreditation->accreditationPlan = json_decode($row['accreditationPlan'], true) ?: [];
                $accreditation->documentYears = json_decode($row['documentYears'], true) ?: [];
                $accreditation->finishDay = json_decode($row['finishDay'], true) ?: [];
                $accreditation->experienceYears = $row['experienceYears'];
                if(in_array($year, $accreditation->accreditationPlan)){
                    $accreditationList[] = $accreditation;
                }
            }
        }
        return $accreditationList;
    }


    public function Show(){
        echo "Accreditation ID: " . $this->accreditationID . "<br>";
        echo "Employer ID: " . $this->employerID . "<br>";
        echo "Accreditation Plan: " . json_encode($this->accreditationPlan) . "<br>";
        echo "Document Years: " . json_encode($this->documentYears) . "<br>";
        echo "Finish Day: " . json_encode($this->documentYears) . "<br>";
        echo "Expirience Years: " . $this->experienceYears . "<br>";
    }

    public function CheckYearByID($EmpID, $tempYear){
        $sql = "SELECT * FROM accreditation WHERE employerID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $EmpID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $documentYears = json_decode($row['documentYears'], true);
        $stmt->close();
        if (in_array($tempYear, $documentYears)){
            return true;
        }
        return false;
    }

    public function getCurrentCategory() {
        if (empty($this->accreditationPlan) || !is_array($this->accreditationPlan)) {
            return null;
        }
    
        $currentYear = date('Y');
        $latestCategory = null;
        $latestYear = 0;
    
        foreach ($this->accreditationPlan as $category => $year) {
            if ($year !== null && $year <= $currentYear && $year > $latestYear) {
                $latestCategory = $category;
                $latestYear = $year;
            }
        }
    
        return $latestCategory;
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