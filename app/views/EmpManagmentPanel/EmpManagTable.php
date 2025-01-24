<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/DashboardModel.php';
    require_once __DIR__ . '../../partials/modalEmpMan.php';
    require_once __DIR__ . '../../partials/modalDelete.php';
    require_once __DIR__ . '/../../../app/models/deleteEndpoint.php';

    // require_once __DIR__ . '/../../../app/models/deleteEmpModel.php';

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

<script src="../../../public/js/tableSearching.js"></script>

<script src="../../../public/js/tableEmpFilters.js"></script>

<script src="../../../public/js/EmpManagTableBut.js"></script>

<script>
    // JavaScript for handling modal interactions
    document.querySelectorAll('.Delete-button').forEach(button => {
    button.addEventListener('click', event => {
        const employerId = button.getAttribute('data-employer-id');
        document.getElementById('deleteEmployerId').textContent = employerId;

        const confirmButton = document.getElementById('confirmDeleteEmployer');
        confirmButton.onclick = () => deleteEmployer(employerId);
    });
});

function deleteEmployer(employerId) {
    const adminPassword = document.getElementById('adminPassword').value;

    if (!adminPassword) {
        alert('Please enter your password to confirm.');
        return;
    }

    fetch('../../../app/models/deleteEndpoint.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ employerID: employerId, password: adminPassword })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Employer deleted successfully.');
            location.reload(); // Обновляем страницу
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the employer.');
    });
}

</script>

</body>
</html>