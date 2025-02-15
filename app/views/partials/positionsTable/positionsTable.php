<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../models/UserVerify.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    <link rel="stylesheet" href="../../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="../../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="EmpManagTable.css">
</head>
<body>



<div class="page-wrapper">
    <?php  
        require_once __DIR__ . "../../../partials/sideBar.php";
    ?>
    <div class="content-wrapper">
        <div class="layout-container">
            <div class="temp-line" style="grid-template-columns: 1fr 1fr auto; margin-top: -10px; margin-bottom: -14px;">
                    <div class="tool-bar-element filters-1" >
                        <?php  
                            require_once __DIR__ . "/../EmpManagPartial/FiltersMenu1.php";
                        ?>
                    </div>

                    <div  class="tool-bar-element filters-2">
                        <?php  
                            require_once __DIR__ . "/../EmpManagPartial/FiltersMenu2.php";
                        ?>
                    </div>

                    <div class="tool-bar-element search-container-u">
                        <?php
                            require_once __DIR__ . "/../EmpManagPartial/searchBar.php";
                        ?>
                    </div>
            </div>

            <div class="temp-line">
                <div class="summary">
                    
                <div class="card" style="margin-top: 25px;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Номер посади</th>
                                    <th scope="col">Назва посади</th>
                                    <th scope="col">Рівень</th>
                                    <th scope="col">Ставка</th>
                                    <th scope="col">Ордер</th>
                                    <th scope="col">Вимоги для отримання посади</th>
                                </tr>
                            </thead>
                            <tbody id="positionsTable">
                                <?php 

                                    require_once __DIR__ . '/../../../models/UserVerify.php';
                                    require_once __DIR__ . "/../../../models/Position.php";

                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);

                                    $tempPos = new Position($connection);
                                    $positionsList[] = new Position($connection);
                                    $positionsList = $tempPos->getAllPosition($connection);
                                    $counter = 1;



                                    foreach ($positionsList as $position)
                                    {   
                                        echo "<tr class=\"table-row\">";
                                        echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                                        echo "<td>{$position->getPositionID()}</td>";
                                        echo "<td>{$position->getPositionName()}</td>";
                                        echo "<td>{$position->getPositionLevel()}</td>";
                                        echo "<td>{$position->getSalary()}</td>";
                                        echo "<td>{$position->getDocumentID()}</td>";
                                        echo "<td>{$position->getPositionRequirements()}</td>";
                                        echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";
                                        echo "
                                        
                                        <a href=\"#\" class=\"docViewBtn\" data-documentID=\"{$position->getDocumentID()}\">

                                        
                                        <button type=\"button\" class=\"editEmployerBtn \" id=\"docViewBtn\"
                                                    data-documentID = \"{$position->getDocumentID()}\">
                                                    
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 22\" class=\"icon_white no-click\">
                                                        <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                                                    </svg>
                                                </button>";

                                        echo "</td>";

                                        echo "</tr>";
                                    }

                                ?>

                            </tbody>
                            
                        </table>
                    </div>
                </div>

                </div>
                <div class="summary">

                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
document.querySelectorAll('.no-click').forEach(element => {
element.addEventListener('click', event => {
    event.stopPropagation(); // Останавливает дальнейшую обработку события
    });
});

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('positionsTable').addEventListener('click', event => {
        const button = event.target.closest('.docViewBtn');
        if (button) {
            const docID = button.getAttribute('data-documentID');
            window.open(`../../../models/GetData/getDocument.php?documentID=${docID}`, '_blank');
        }
    });
});


</script>


<script src="../../../../public/js/navBar.js"></script>

