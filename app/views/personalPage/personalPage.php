<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/ContinuingEducation.php';
    require_once __DIR__ . '/../../../app/models/ContinuingEducationHistory.php';
    require_once __DIR__ . '/../../../app/models/classes/Accreditation.php';
    require_once __DIR__ . '/../../../app/models/modals/AddCourse.php';
    require_once __DIR__ . '/../../../app/models/modals/EditCourses.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalAddCourses.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalDeleteCourse.php';
    require_once __DIR__ . '../../partials/CoursesManag/modalEditCourses.php';
    require_once __DIR__ . '../../partials/personalPage/modalAccreditationDetail.php';
    require_once __DIR__ . '/../../../app/models/Position.php';
    require_once __DIR__ . '/../../../app/models/EmployerPositions.php';
    
    require_once __DIR__ . '/../../../app/models/classes/Accreditation.php';

    $employerPage = new Employer($connection);
    $employerPage->loadByID($_SESSION['employer_ID']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Персональний кабінет</title>
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
            


            <div class="grid-layout">
                <div class="left-block">
                    <?php  
                        require_once __DIR__ . "/../partials/personalPage/PersonalData.php";
                    ?>
                </div>

                <div class="right-top">
                    <?php  
                        require_once __DIR__ . "/../partials/personalPage/CoursesData.php";
                    ?>
                </div>

                <div class="right-middle">
                    <?php  
                        require_once __DIR__ . "/../partials/personalPage/AccreditationData.php";
                    
                        require_once __DIR__ . "/../partials/personalPage/PositionsData.php";
                    ?>


                </div>

                <div class="right-bottom">


                    <div class="card p-4" style="margin-top: 20px;">
                        <h5 class="mb-3 text-center">Усі документи користувача</h5> 
                        
                        <?php  
                            require_once __DIR__ . "/../partials/personalPage/searchBar.php";
                        ?>

                        <?php  
                            require_once __DIR__ . "/../partials/personalPage/DocumentData.php";
                        ?>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<script src="../../../public/js/tooltip.js"></script>

<script src="../../../public/js/navBar.js"></script>

<script src="../../../public/js/coursesJS/ModalDataTable.js"></script>

<script src="../../../public/js/personalJS/ultimate.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    
    $(document).ready(function() {
        $('#employeeSelect').select2({
            dropdownParent: $('#addCourseModal'),
            placeholder: "Введить ПІБ...",
            allowClear: true,
            width: '100%'
        });
    });
</script>

</body>
</html>