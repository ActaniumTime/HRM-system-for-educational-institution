<div class="container my-4">
    <h1 class="text-center mb-4">All Employees</h1>
    <div class="table-responsive">
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
            <tbody>
                <?php 
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
                        echo "<td>";
                        echo "<button type=\"button\" class=\"btn btn-primary editEmployerBtn\" 
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
                                Edit Employer
                              </button>";
                        echo "</td>";
                        
                        echo "</tr>";
                    }

                ?>
            </tbody>
        </table>   
    </div>
</div>