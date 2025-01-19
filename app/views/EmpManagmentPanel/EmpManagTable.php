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
    <style>
/* Основные стили */
body {
    background: #f7f9fc;
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    color: #5a5af7;
    font-weight: bold;
}

.search-container {
    position: relative;
}

.search-input {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px 15px;
    font-size: 1rem;
    transition: box-shadow 0.3s ease;
}

.search-input:focus {
    box-shadow: 0 0 8px rgba(90, 90, 247, 0.4);
    outline: none;
}

.search-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    color: #5a5af7;
    cursor: pointer;
}

.custom-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.custom-table th, .custom-table td {
    padding: 15px;
    text-align: center;
}

.custom-table thead th {
    background: #f0f2f5;
    color: #333;
    font-weight: bold;
}

.custom-table tbody tr {
    transition: background-color 0.2s;
}

.custom-table tbody tr:hover {
    background-color: #f9f9f9;
}

.custom-table img {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    border: 2px solid #5a5af7;
}

    </style>
</head>
<body>

<?php
    require_once __DIR__ . "../../partials/tableEmp.php";
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../../public/js/ModalDataTable.js"></script>

<script src="../../../public/js/EmpManagTableBut.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchIcon = document.getElementById("searchIcon");
        const searchInput = document.getElementById("searchInput");
        const table = document.getElementById("employeeTable");

        // Показать/скрыть строку поиска
        searchIcon.addEventListener("click", () => {
            searchInput.classList.toggle("active");
            if (searchInput.classList.contains("active")) {
                searchInput.focus();
            } else {
                searchInput.value = "";
                filterTable("");
            }
        });

        // Фильтрация таблицы
        searchInput.addEventListener("input", () => {
            const query = searchInput.value.toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            Array.from(table.rows).forEach(row => {
                const cells = Array.from(row.cells).slice(4, 7); // Только столбцы с именем, фамилией и отчеством
                const matches = cells.some(cell => cell.textContent.toLowerCase().includes(query));
                row.style.display = matches ? "" : "none";
            });
        }
    });
</script>

</body>
</html>