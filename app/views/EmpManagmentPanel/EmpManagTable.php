<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';

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
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"> № </th>
            <th scope="col"> Employer`s ID </th>
            <th scope="col"> Access level </th>
            <th scope="col"> Name </th>
            <th scope="col"> Surname </th>
            <th scope="col"> Fathername </th>
            <th scope="col"> Birthday  </th>
            <th scope="col"> Gender </th>
            <th scope="col"> Passport ID </th>
            <th scope="col"> Home adress </th>
            <th scope="col"> Email </th>
            <th scope="col"> Phone number </th>
            <th scope="col"> Department </th>
            <th scope="col"> Accepted from </th>
            <th scope="col"> Current status </th>
            <th scope="col"> Fired from </th>
            <th scope="col"> Admission basis </th>
            <th scope="col"> Employement type </th>
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
                echo "</tr>";
            }
        ?>



        <!-- <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr> -->
    </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>