<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/DashboardModel.php';
    require_once __DIR__ . '/../partials/modalEmpMan.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="EmpManagTable.css">
</head>
<body>

<?php
    require_once __DIR__ . "../../partials/tableEmp.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../../public/js/ModalDataTable.js"></script>

<script src="../../../public/js/EmpManagTableBut.js"></script>

<script src="../../../public/js/tableSearching.js"></script>

<script src="../../../public/js/tableEmpFilters.js"></script>

</body>
</html>