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
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>

        <tr>
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


        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
