
<div class="card">

    <div class="tool-bar">
        <div class="tool-bar-element" >
            <?php  
                require_once __DIR__ . "/EmpManagPartial/FiltersMenu1.php";
            ?>
        </div>

        <div  class="tool-bar-element">
            <?php  
                require_once __DIR__ . "/EmpManagPartial/FiltersMenu2.php";
            ?>
        </div>

        <div>
            <?php
                require_once __DIR__ . "/EmpManagPartial/searchBar.php";
            ?>
        </div>
    </div>




    <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Avatar</th>
                <th scope="col">Access Level</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Fathername</th>
                <th scope="col">Birthday</th>
                <th scope="col">Gender</th>
                <th scope="col">Passport ID</th>
                <th scope="col">Home Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Department</th>
                <th scope="col">Accepted From</th>
                <th scope="col">Current Status</th>
                <th scope="col">Fired From</th>
                <th scope="col">Admission Basis</th>
                <th scope="col">Employment Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            <?php 
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $EmployersList[] = new Employer($connection);
                $EmployersList = $emp->getAll($connection);
                $counter = 1;


                foreach ($EmployersList as $employer)
                {   
                    $AccID = $employer->getAccessLevelID();
                    echo "<tr class=\"table-row\">";
                    echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                    echo "<td><img src=\"../../../Files/photos/{$employer->getAvatar()}\" alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\"  id=\"employerAvatar\"></td>";
                    
                    switch ($AccID) {
                        case 1:
                            echo "<td>Admin</td>";
                            break;
                        case 2:
                            echo "<td>Manager</td>";
                            break;
                        case 3:
                            echo "<td>Employee</td>";
                            break;
                        default:
                            echo "<td>Unknown</td>";
                            break;
                    }
                    
                    echo "<td>{$employer->getName()}</td>";
                    echo "<td>{$employer->getSurname()}</td>";
                    echo "<td>{$employer->getFathername()}</td>";
                    echo "<td>{$employer->getBirthday()}</td>";
                    echo "<td>{$employer->getGender()}</td>";
                    echo "<td>{$employer->getPassportID()}</td>";
                    echo "<td>{$employer->getHomeAddress()}</td>";
                    echo "<td>{$employer->getEmail()}</td>";
                    echo "<td>{$employer->getPhoneNumber()}</td>";
                    echo "<td>{$employer->getDepartment()}</td>";
                    echo "<td>{$employer->getDateAccepted()}</td>";
                    echo "<td>{$employer->getCurrentStatus()}</td>";
                    echo "<td>{$employer->getDateFired()}</td>";
                    echo "<td>{$employer->getAdmissionBasis()}</td>";
                    echo "<td>{$employer->getEmploymentType()}</td>";   
                    echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";
                    echo "<button type=\"button\" class=\"editEmployerBtn \" 
                            data-employer-avatar=\"../../../Files/photos/{$employer->getAvatar()}\"
                            data-employer-id=\"{$employer->getEmployerID()}\"
                            data-access-level-id=\"{$employer->getAccessLevelID()}\"
                            data-name=\"{$employer->getName()}\"
                            data-surname=\"{$employer->getSurname()}\"
                            data-fathername=\"{$employer->getFathername()}\"
                            data-birthday=\"{$employer->getBirthday()}\"
                            data-gender=\"{$employer->getGender()}\"
                            data-passport-id=\"{$employer->getPassportID()}\"
                            data-home-address=\"{$employer->getHomeAddress()}\"
                            data-email=\"{$employer->getEmail()}\"
                            data-phone-number=\"{$employer->getPhoneNumber()}\"
                            data-department=\"{$employer->getDepartment()}\"
                            data-date-accepted=\"{$employer->getDateAccepted()}\"
                            data-current-status=\"{$employer->getCurrentStatus()}\"
                            data-date-fired=\"{$employer->getDateFired()}\"
                            data-admission-basis=\"{$employer->getAdmissionBasis()}\"
                            data-employment-type=\"{$employer->getEmploymentType()}\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#employerModal\">
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                            <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                            </svg>


                            </button>";
                    
                    echo "<button type=\"button\" class=\"Delete-button\"
                            data-employer-id=\"{$employer->getEmployerID()}\"
                            data-bs-toggle=\"modal\"
                            data-bs-target=\"#deleteEmployerModal\">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z\"/>
                            </svg>

                        </button>";

                    echo "<button type=\"button\" class=\"Info-button\" 
                            data-employer-id=\"{$employer->getEmployerID()}\"
                            data-bs-toggle=\"modal\">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z\"/>
                            </svg>


                        </button>";
                    
                    echo "</td>";
                    
                    
                    
                    echo "</tr>";
                }

            ?>

        </tbody>
        
    </table>
    </div>


</div>



<script>
    document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation(); // Останавливает дальнейшую обработку события
        });
    });

</script>

