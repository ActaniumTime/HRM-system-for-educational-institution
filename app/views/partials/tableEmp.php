
<div class="table-responsive card">
    
    <table class="table table-hover table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Avatar</th>
                <th scope="col">Employer's ID</th>
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
                    echo "<tr>";
                    echo "<th scope=\"row\">" . $counter++ . "</th>";
                    echo "<td><img src=\"../../../Files/photos/{$employer->getAvatar()}\" alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\"  id=\"employerAvatar\"></td>";
                    echo "<td>{$employer->getEmployerID()}</td>";
                    echo "<td>{$employer->getAccessLevelID()}</td>";
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
                    echo "<td class=\"d-flex\">";
                    echo "<button type=\"button\" class=\"editEmployerBtn\" 
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
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\" >
                            <path d=\"m19.5,0H4.5C2.019,0,0,2.019,0,4.5v15c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5V4.5c0-2.481-2.019-4.5-4.5-4.5Zm3.5,19.5c0,1.93-1.57,3.5-3.5,3.5H4.5c-1.93,0-3.5-1.57-3.5-3.5V4.5c0-1.93,1.57-3.5,3.5-3.5h15c1.93,0,3.5,1.57,3.5,3.5v15ZM14.732,5.732L6.025,14.439c-.661.66-1.025,1.539-1.025,2.475v1.586c0,.276.224.5.5.5h1.586c.921,0,1.823-.374,2.475-1.025l8.707-8.707c.975-.975.975-2.561,0-3.535-.943-.945-2.592-.945-3.535,0Zm-5.879,11.535c-.465.466-1.11.732-1.768.732h-1.086v-1.086c0-.668.26-1.296.732-1.768l6.604-6.604,2.121,2.121-6.604,6.604Zm8.707-8.707l-1.396,1.396-2.121-2.121,1.396-1.396c.566-.566,1.555-.566,2.121,0,.585.585.585,1.536,0,2.121Z\"/>
                            </svg>


                            </button>";
                    
                    echo "<button type=\"button\" class=\"Delete-button\"
                            data-employer-id=\"{$employer->getEmployerID()}\"
                            data-bs-toggle=\"modal\"
                            data-bs-target=\"#deleteEmployerModal\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m15.854,10.854l-3.146,3.146,3.146,3.146c.195.195.195.512,0,.707-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-3.146-3.146-3.146,3.146c-.098.098-.226.146-.354.146s-.256-.049-.354-.146c-.195-.195-.195-.512,0-.707l3.146-3.146-3.146-3.146c-.195-.195-.195-.512,0-.707s.512-.195.707,0l3.146,3.146,3.146-3.146c.195-.195.512-.195.707,0s.195.512,0,.707Zm7.146-6.354c0,.276-.224.5-.5.5h-1.5c0,.015,0,.03-.002.046l-1.37,14.867c-.215,2.33-2.142,4.087-4.481,4.087h-6.272c-2.337,0-4.263-1.754-4.48-4.08l-1.392-14.873c-.001-.016-.002-.031-.002-.047h-1.5c-.276,0-.5-.224-.5-.5s.224-.5.5-.5h5.028c.25-2.247,2.16-4,4.472-4h2c2.312,0,4.223,1.753,4.472,4h5.028c.276,0,.5.224.5.5Zm-15.464-.5h8.928c-.243-1.694-1.704-3-3.464-3h-2c-1.76,0-3.221,1.306-3.464,3Zm12.462,1H4.002l1.387,14.826c.168,1.81,1.667,3.174,3.484,3.174h6.272c1.82,0,3.318-1.366,3.485-3.179l1.366-14.821Z\"/>
                            </svg>
                        </button>";

                    echo "<button type=\"button\" class=\"Info-button\"
                            data-employer-id=\"{$employer->getEmployerID()}\"
                            data-bs-toggle=\"modal\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M12.5,19c-.28,0-.5-.22-.5-.5v-7c0-.83-.67-1.5-1.5-1.5-.28,0-.5-.22-.5-.5s.22-.5,.5-.5c1.38,0,2.5,1.12,2.5,2.5v7c0,.28-.22,.5-.5,.5Zm-.5-14c-.55,0-1,.45-1,1s.45,1,1,1,1-.45,1-1-.45-1-1-1Zm12,14.5V4.5c0-2.48-2.02-4.5-4.5-4.5H4.5C2.02,0,0,2.02,0,4.5v15c0,2.48,2.02,4.5,4.5,4.5h15c2.48,0,4.5-2.02,4.5-4.5ZM19.5,1c1.93,0,3.5,1.57,3.5,3.5v15c0,1.93-1.57,3.5-3.5,3.5H4.5c-1.93,0-3.5-1.57-3.5-3.5V4.5c0-1.93,1.57-3.5,3.5-3.5h15Z\"/>
                            </svg>

                        </button>";
                    
                    echo "</td>";
                    
                    
                    
                    echo "</tr>";
                }

            ?>

        </tbody>
        
    </table>
</div>



<script>
    document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation(); // Останавливает дальнейшую обработку события
        });
    });

</script>
