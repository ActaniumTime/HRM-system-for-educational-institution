<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/DashboardModel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">All Employees</h1>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">№</th>
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
<?php

    require_once __DIR__ . '/../partials/modalEmpMan.php';

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Получаем все кнопки редактирования
        const editButtons = document.querySelectorAll('.editEmployerBtn');
        
        // Перебираем кнопки и добавляем обработчик событий
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Получаем данные из атрибутов кнопки
                const employerID = button.getAttribute('data-employer-id');
                const accessLevelID = button.getAttribute('data-access-level-id');
                const name = button.getAttribute('data-name');
                const surname = button.getAttribute('data-surname');
                const fathername = button.getAttribute('data-fathername');
                const birthday = button.getAttribute('data-birthday');
                const gender = button.getAttribute('data-gender');
                const passportID = button.getAttribute('data-passport-id');
                const homeAddress = button.getAttribute('data-home-address');
                const email = button.getAttribute('data-email');
                const phoneNumber = button.getAttribute('data-phone-number');
                const department = button.getAttribute('data-department');
                const dateAccepted = button.getAttribute('data-date-accepted');
                const currentStatus = button.getAttribute('data-current-status');
                const dateFired = button.getAttribute('data-date-fired');
                const admissionBasis = button.getAttribute('data-admission-basis');
                const employmentType = button.getAttribute('data-employment-type');
                
                // Заполняем поля модального окна
                document.getElementById('employerID').value = employerID;
                document.getElementById('accessLevelID').value = accessLevelID;
                document.getElementById('name').value = name;
                document.getElementById('surname').value = surname;
                document.getElementById('fathername').value = fathername;
                document.getElementById('birthday').value = birthday;
                document.getElementById('gender').value = gender;
                document.getElementById('passportID').value = passportID;
                document.getElementById('homeAddress').value = homeAddress;
                document.getElementById('email').value = email;
                document.getElementById('phoneNumber').value = phoneNumber;
                document.getElementById('department').value = department;
                document.getElementById('dateAccepted').value = dateAccepted;
                document.getElementById('currentStatus').value = currentStatus;
                document.getElementById('dateFired').value = dateFired;
                document.getElementById('admissionBasis').value = admissionBasis;
                document.getElementById('employmentType').value = employmentType;
            });
        });
    });
</script>

<script src="../../../public/js/EmpManagTableBut.js"></script>


</body>
</html>