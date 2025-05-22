
<div class="card" style="margin-top: 25px;">

    <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Аватар</th>
                <th scope="col">Рівень доступу</th>
                <th scope="col">Призвище</th>
                <th scope="col">Ім'я</th>
                <th scope="col">По батькові</th>
                <th scope="col">День Народження</th>
                <th scope="col">Стать</th>
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>
                <th scope="col">Циклова Коміссія</th>
                <th scope="col">Дії</th>
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
                            echo "<td>Директор</td>";
                            break;
                        case 2:
                            echo "<td>HR_менеджер</td>";
                            break;
                        case 3:
                            echo "<td>Співробітник</td>";
                            break;
                        default:
                            echo "<td>Хто ти, воїн?...</td>";
                            break;
                    }
                    
                    echo "<td>{$employer->getSurname()}</td>";
                    echo "<td>{$employer->getName()}</td>";
                    echo "<td>{$employer->getFathername()}</td>";
                    echo "<td>{$employer->getBirthday()}</td>";
                    echo "<td>{$employer->getGender()}</td>";
                    echo "<td>{$employer->getEmail()}</td>";
                    echo "<td>{$employer->getPhoneNumber()}</td>";
                    echo "<td>{$employer->getDepartment()}</td>";
                 
                    echo "<td style=\"border-radius:  0px 36px 36px 0px ;\">";

                    echo "<div class=\"d-flex\">";
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
                            data-bs-toggle=\"modal\" data-bs-target=\"#employerModal\"
                            title=\"Редагувати рівень доступу співробітника\">
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                            <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                            </svg>


                            </button>";
                
                    
                    echo "</div>";
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
        event.stopPropagation(); 
        });
    });

</script>

