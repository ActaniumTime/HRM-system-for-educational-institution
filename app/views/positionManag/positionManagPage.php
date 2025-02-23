<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/Position.php';
    require_once __DIR__ . '/../../../app/models/Document.php';
    require_once __DIR__ . '../../partials/positionsManagPartial/modalDelPosition.php';
    require_once __DIR__ . '../../partials/positionsManagPartial/modalAddPosotion.php';
    require_once __DIR__ . '../../partials/positionsManagPartial/modalEditPosition.php';
    
    require_once __DIR__ . '/../../../app/models/modals/deletePosition.php';
    require_once __DIR__ . '/../../../app/models/modals/EditPosition.php';



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
    <link rel="stylesheet" href="EmpManagTable.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle2.css">
    <link rel="stylesheet" href="../../../public/css/modalAddPosition.css">
    <link rel="stylesheet" href="../../../public/css/hints.css">

</head>
<body>

<div class="page-wrapper">
<?php  
    require_once __DIR__ . "../../partials/sideBar.php";
?>

    <div class="content-wrapper">
        <div class="layout-container">
            
            <div class="temp-line" style="grid-template-columns: 1fr 1fr auto; margin-top: -10px; margin-bottom: -14px;">

                    <div  class="tool-bar-element filters-2">
                        <?php  
                            require_once __DIR__ . "/../partials/positionsManagPartial/FiltersMenu.php";
                        ?>
                    </div>

                    <div class="tool-bar-element search-container-u">
                        <?php
                            require_once __DIR__ . "/../partials/positionsManagPartial/searchBar.php";
                        ?>
                    </div>
            </div>

            <div class="temp-line">
                <div class="summary">
                    <?php require_once __DIR__ . "../../partials/positionsManagPartial/positionsTable.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../../public/js/positionJS/DeletePosition.js"></script>
<script src="../../../public/js/positionJS/AddPositions.js"></script>
<script src="../../../public/js/navBar.js"></script>
<script src="../../../public/js/positionJS/tablePositionFilters.js"></script>
<script src="../../../public/js/positionJS/tablePositionSearch.js"></script>
<script src="../../../public/js/positionJS/DataPositionTable.js"></script>
<script src="../../../public/js/positionJS/EditPosition.js"></script>

</body>
</html>