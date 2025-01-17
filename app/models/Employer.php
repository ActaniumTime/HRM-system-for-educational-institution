<?php
class Employer {
    private $connection;
    private $employerID;
    private $accessLevelID;
    private $password;
    private $name;
    private $surname;
    private $fathername;
    private $birthday;
    private $gender;
    private $passportID;
    private $homeAddress;
    private $email;
    private $phoneNumber;
    private $department;
    private $dateAccepted;
    private $currentStatus;
    private $dateFired;
    private $admissionBasis;
    private $employmentType;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function Show(){
        echo "employerID: " . $this->employerID . "<br>";
        echo "accessLevelID: " . $this->accessLevelID . "<br>";
        echo "password: " . $this->password . "<br>";
        echo "name: " . $this->name . "<br>";
        echo "surname: " . $this->surname . "<br>";
        echo "fathername: " . $this->fathername . "<br>";
        echo "birthday: " . $this->birthday . "<br>";
        
    }

    // Метод для загрузки данных о сотруднике по ID
    public function loadByID($id) {
        $query = "SELECT * FROM Employers WHERE employerID = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->employerID = $data['employerID'];
            $this->accessLevelID = $data['accessLevelID'];
            $this->password = $data['password'];
            $this->name = $data['name'];
            $this->surname = $data['surname'];
            $this->fathername = $data['fathername'];
            $this->birthday = $data['birthday'];
            $this->gender = $data['gender'];
            $this->passportID = $data['passportID'];
            $this->homeAddress = $data['homeAddress'];
            $this->email = $data['email'];
            $this->phoneNumber = $data['phoneNumber'];
            $this->department = $data['department'];
            $this->dateAccepted = $data['dateAccepted'];
            $this->currentStatus = $data['currentStatus'];
            $this->dateFired = $data['dateFired'];
            $this->admissionBasis = $data['admissionBasis'];
            $this->employmentType = $data['employmentType'];
            
        }
    }


    public function verify($email, $password) {
        $query = "SELECT * FROM Employers WHERE email = ? LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if (password_verify($password, $data['password'])) {

                $_SESSION['employer_ID'] = $data['employerID'];
                $token = bin2hex(random_bytes(32));

                $uquery = "UPDATE Employers SET token = ? WHERE email = ?";
                $ustmt = $this->connection->prepare($uquery);
                $ustmt->bind_param("ss", $token, $email);
                $ustmt->execute();

                setcookie("token", $token, time() + 60 * 60 * 24 * 30, "/");

                $this->employerID = $data['employerID'];
                $this->accessLevelID = $data['accessLevelID'];
                $this->password = $data['password'];
                $this->name = $data['name'];
                $this->surname = $data['surname'];
                $this->fathername = $data['fathername'];
                $this->birthday = $data['birthday'];
                $this->gender = $data['gender'];
                $this->passportID = $data['passportID'];
                $this->homeAddress = $data['homeAddress'];
                $this->email = $data['email'];
                $this->phoneNumber = $data['phoneNumber'];
                $this->department = $data['department'];
                $this->dateAccepted = $data['dateAccepted'];
                $this->currentStatus = $data['currentStatus'];
                $this->dateFired = $data['dateFired'];
                $this->admissionBasis = $data['admissionBasis'];
                $this->employmentType = $data['employmentType'];
                
                return true;
            }
        }
        return false;
    }

    // Метод для получения всех сотрудников
    public static function getAll($connection) {
        $query = "SELECT * FROM Employers";
        $result = $connection->query($query);
        $employees = [];

        while ($row = $result->fetch_assoc()) {
            $employee = new Employer($connection);
            $employee->employerID = $row['employerID'];
            $employee->accessLevelID = $row['accessLevelID'];
            $employee->password = $row['password'];
            $employee->name = $row['name'];
            $employee->surname = $row['surname'];
            $employee->fathername = $row['fathername'];
            $employee->birthday = $row['birthday'];
            $employee->gender = $row['gender'];
            $employee->passportID = $row['passportID'];
            $employee->homeAddress = $row['homeAddress'];
            $employee->email = $row['email'];
            $employee->phoneNumber = $row['phoneNumber'];
            $employee->department = $row['department'];
            $employee->dateAccepted = $row['dateAccepted'];
            $employee->currentStatus = $row['currentStatus'];
            $employee->dateFired = $row['dateFired'];
            $employee->admissionBasis = $row['admissionBasis'];
            $employee->employmentType = $row['employmentType'];

            $employees[] = $employee;
        }
        return $employees;
    }

    public function addEmployer(
        $accessLevelID,
        $password,
        $name,
        $surname,
        $fathername,
        $birthday,
        $gender,
        $passportID,
        $homeAddress,
        $email,
        $phoneNumber,
        $department,
        $dateAccepted,
        $currentStatus,
        $dateFired,
        $admissionBasis,
        $employmentType
    )
     {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO employers (
                    accessLevelID,
                    password,
                    name,
                    surname,
                    fathername,
                    birthday,
                    gender,
                    passportID,
                    homeAddress,
                    email,
                    phoneNumber,
                    department,
                    dateAccepted,
                    currentStatus,
                    dateFired,
                    admissionBasis,
                    employmentType
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->connection->prepare($sql);
    
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
        }
    
        $stmt->bind_param(
            "issssssssssssssss",
            $accessLevelID,
            $hashedPassword,
            $name,
            $surname,
            $fathername,
            $birthday,
            $gender,
            $passportID,
            $homeAddress,
            $email,
            $phoneNumber,
            $department,
            $dateAccepted,
            $currentStatus,
            $dateFired,
            $admissionBasis,
            $employmentType
        );
        if ($stmt->execute()) {
            echo "Employer added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }

    // public function updateData($EmpList, $index) {
    //     if (isset($EmpList[$index])) {
    //         $data = $EmpList[$index];
    //         $this->employerID = $data['employerID'];
    //         $this->accessLevelID = $data['accessLevelID'];
    //         $this->password = $data['password'];
    //         $this->name = $data['name'];
    //         $this->surname = $data['surname'];
    //         $this->fathername = $data['fathername'];
    //         $this->birthday = $data['birthday'];
    //         $this->gender = $data['gender'];
    //         $this->passportID = $data['passportID'];
    //         $this->homeAddress = $data['homeAddress'];
    //         $this->email = $data['email'];
    //         $this->phoneNumber = $data['phoneNumber'];
    //         $this->department = $data['department'];
    //         $this->dateAccepted = $data['dateAccepted'];
    //         $this->currentStatus = $data['currentStatus'];
    //         $this->dateFired = $data['dateFired'];
    //         $this->admissionBasis = $data['admissionBasis'];
    //         $this->employmentType = $data['employmentType'];

    //     } else {
    //         throw new Exception("Index not found in the provided list.");
    //     }
    // }

    public function updateEmployer($employer) {
        $query = "UPDATE Employers SET 
                    accessLevelID = ?, 
                    name = ?, 
                    surname = ?, 
                    fathername = ?, 
                    birthday = ?, 
                    gender = ?, 
                    passportID = ?, 
                    homeAddress = ?, 
                    email = ?, 
                    phoneNumber = ?, 
                    department = ?, 
                    dateAccepted = ?, 
                    currentStatus = ?, 
                    dateFired = ?, 
                    admissionBasis = ?, 
                    employmentType = ?
                  WHERE employerID = ?";
    
        $stmt = $this->connection->prepare($query);
    
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
        }
    
        $stmt->bind_param(
            "isssssssssssssssi",
            $employer->getAccessLevelID(),
            $employer->getName(),
            $employer->getSurname(),
            $employer->getFathername(),
            $employer->getBirthday(),
            $employer->getGender(),
            $employer->getPassportID(),
            $employer->getHomeAddress(),
            $employer->getEmail(),
            $employer->getPhoneNumber(),
            $employer->getDepartment(),
            $employer->getDateAccepted(),
            $employer->getCurrentStatus(),
            $employer->getDateFired(),
            $employer->getAdmissionBasis(),
            $employer->getEmploymentType(),
            $employer->getEmployerID() // Primary key to identify the record
        );
    
        if ($stmt->execute()) {
            echo "Employer updated successfully!";
        } else {
            echo "Error updating employer: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    public function jsonToObj($json_obj){
        $this->employerID = $json_obj['employerID'];
        $this->accessLevelID = $json_obj['accessLevelID'];
        $this->name = $json_obj['name'];
        $this->surname = $json_obj['surname'];
        $this->fathername = $json_obj['fathername'];
        $this->birthday = $json_obj['birthday'];
        $this->gender = $json_obj['gender'];
        $this->passportID = $json_obj['passportID'];
        $this->homeAddress = $json_obj['homeAddress'];
        $this->email = $json_obj['email'];
        $this->phoneNumber = $json_obj['phoneNumber'];
        $this->department = $json_obj['department'];
        $this->dateAccepted = $json_obj['dateAccepted'];
        $this->currentStatus = $json_obj['currentStatus'];
        $this->dateFired = $json_obj['dateFired'];
        $this->admissionBasis = $json_obj['admissionBasis'];
        $this->employmentType = $json_obj['employmentType'];
    }

    public function updateChangedFields($data) {
        // Prepare fields for update
        $fields = [];
        $values = [];
    
        // Check each field for changes
        foreach ($data as $key => $value) {
            if (property_exists($this, $key) && $this->$key !== $value) {
                $fields[] = "$key = ?";
                // If the value is empty and it's a date, set it to NULL
                if ($key === 'dateFired' && empty($value)) {
                    $values[] = null; // Set dateFired to NULL if empty
                } else {
                    $values[] = $value;
                }
            }
        }
    
        // If no fields were changed, return early
        if (empty($fields)) {
            echo "No fields were changed.";
            return;
        }
    
        // Add the ID for WHERE clause
        $values[] = $this->employerID;
    
        // Formulate the SQL query
        $query = "UPDATE employers SET " . implode(", ", $fields) . " WHERE employerID = ?";
    
        // Prepare and execute the query
        $stmt = $this->connection->prepare($query);
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $this->connection->error);
        }
    
        // Create type string for bind_param
        $types = str_repeat("s", count($values) - 1) . "i";
    
        // Bind parameters
        $stmt->bind_param($types, ...$values);
    
        if ($stmt->execute()) {
            echo "Fields updated successfully!";
        } else {
            echo "Error updating fields: " . $stmt->error;
        }
    
        $stmt->close();
    }
    


    //геттеры и сеттеры
    public function getEmployerID() { return $this->employerID; }
    public function setEmployerID($employerID) { $this->employerID = $employerID; }

    public function getAccessLevelID() { return $this->accessLevelID; }
    public function setAccessLevelID($accessLevelID) { $this->accessLevelID = $accessLevelID; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getSurname() { return $this->surname; }
    public function setSurname($surname) { $this->surname = $surname; }

    public function getFathername() { return $this->fathername; }
    public function setFathername($fathername) { $this->fathername = $fathername; }

    public function getBirthday() { return $this->birthday; }
    public function setBirthday($birthday) { $this->birthday = $birthday; }

    public function getGender() { return $this->gender; }
    public function setGender($gender) { $this->gender = $gender; }

    public function getPassportID() { return $this->passportID; }
    public function setPassportID($passportID) { $this->passportID = $passportID; }

    public function getHomeAddress() { return $this->homeAddress; }
    public function setHomeAddress($homeAddress) { $this->homeAddress = $homeAddress; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPhoneNumber() { return $this->phoneNumber; }
    public function setPhoneNumber($phoneNumber) { $this->phoneNumber = $phoneNumber; }

    public function getDepartment() { return $this->department; }
    public function setDepartment($department) { $this->department = $department; }

    public function getDateAccepted() { return $this->dateAccepted; }
    public function setDateAccepted($dateAccepted) { $this->dateAccepted = $dateAccepted; }

    public function getCurrentStatus() { return $this->currentStatus; }
    public function setCurrentStatus($currentStatus) { $this->currentStatus = $currentStatus; }

    public function getDateFired() { return $this->dateFired; }
    public function setDateFired($dateFired) { $this->dateFired = $dateFired; }

    public function getAdmissionBasis() { return $this->admissionBasis; }
    public function setAdmissionBasis($admissionBasis) { $this->admissionBasis = $admissionBasis; }

    public function getEmploymentType() { return $this->employmentType; }
    public function setEmploymentType($employmentType) { $this->employmentType = $employmentType; }
}





?>
