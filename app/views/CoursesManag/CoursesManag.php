<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/ContinuingEducation.php';
    require_once __DIR__ . '/../../../app/models/ContinuingEducationHistory.php';
    require_once __DIR__ . '/../../../app/models/modals/AddCourse.php';
    require_once __DIR__ . '/../../../app/models/modals/EditCourses.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalAddCourses.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalDeleteCourse.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalEditCourses.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle2.css">
    <link rel="stylesheet" href="../../../public/css/addEmpModalStyles.css">
    <link rel="stylesheet" href="../../../public/css/hints.css">
    <link rel="stylesheet" href="EmpManagTable.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>


<div class="page-wrapper">
<?php  
    require_once __DIR__ . "../../partials/sideBar.php";
?>

    <div class="content-wrapper">
        <div class="layout-container">
            
            <div class="temp-line" style="grid-template-columns: 1fr 1fr auto; margin-top: -10px; margin-bottom: -14px;">
                <div class="tool-bar-element filters-1" >
                    <?php  
                        require_once __DIR__ . "/../partials/CoursesManag/FiltersMenu.php";
                    ?>
                </div>

                <div class="tool-bar-element search-container-u">
                    <?php
                        require_once __DIR__ . "/../partials/CoursesManag/searchBar.php";
                    ?>
                </div>
            </div>

            <div class="temp-line">
                <div class="summary">
                    <?php require_once __DIR__ . "/../partials/CoursesManag/tableEmp.php"; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script src="../../../public/js/AddDeleteUser.js"></script> -->
 
<script src="../../../public/js/tooltip.js"></script>

<script src="../../../public/js/navBar.js"></script>

<script src="../../../public/js/coursesJS/ModalDataTable.js"></script>

<script src="../../../public/js/coursesJS/EditCourse.js"></script>

<script src="../../../public/js/coursesJS/deleteCourse.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    
    $(document).ready(function() {
        $('#employeeSelect').select2({
            dropdownParent: $('#addCourseModal'), // Обеспечивает корректное отображение в модальном окне
            placeholder: "Введить ПІБ...",
            allowClear: true,
            width: '100%'
        });
    });
</script>

</body>
</html>