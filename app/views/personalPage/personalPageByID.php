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

    $empIDPage = new Employer($connection); 
    if (isset($_GET['emp_ID'])) {
        $empID = $_GET['emp_ID']; 
        $empIDPage->loadByID($empID); 
    } else {
        echo "ID пользователя не передан.";
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Персональний кабінет співробітника</title>
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
                    <div class="card p-4">
                        <h5 class="mb-3 text-center">Персональна інформація</h5>
                        <div class="row">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img src="../../../Files/photos/<?= $empIDPage->getAvatar() ?: '/default-avatar.png' ?>" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9" style="width: 100%;">
                                <table class="table align-middle">
                                    <tbody>

                                        <tr>
                                            <th>ID співробітника</th>
                                            <td><?= $empIDPage->getEmployerID() ?></td>
                                        </tr>

                                        <tr>
                                            <th>Рівень доступу у системі</th>
                                            <?= $AccID = $empIDPage->getAccessLevelID();
                                            switch ($AccID) {
                                                case 1:
                                                    echo "<td>Адміністратор/Директор</td>";
                                                    break;
                                                case 2:
                                                    echo "<td>HR-менеджер</td>";
                                                    break;
                                                case 3:
                                                    echo "<td>Співробітник</td>";
                                                    break;
                                                default:
                                                    echo "<td>Не визначен</td>";
                                                    break;
                                            }
                                            ?>
                                        </tr>
                                        
                                        <tr>
                                            <th>ПІБ</th>
                                            <td><?= $empIDPage->getSurname() . ' ' . $empIDPage->getName() . ' ' . $empIDPage->getFathername(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Дата народження</th>
                                            <td><?= $empIDPage->getBirthday(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Стать</th>
                                            <td><?= $empIDPage->getGender(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Паспорт</th>
                                            <td><?= $empIDPage->getPassportID(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Адреса</th>
                                            <td><?= $empIDPage->getHomeAddress(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $empIDPage->getEmail(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Телефон</th>
                                            <td><?= $empIDPage->getPhoneNumber(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Відділ</th>
                                            <td><?= $empIDPage->getDepartment(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Дата прийняття</th>
                                            <td><?= $empIDPage->getDateAccepted(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Тип зайнятості</th>
                                            <td><?= $empIDPage->getEmploymentType(); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Поточний статус</th>
                                            <td><?= $empIDPage->getCurrentStatus(); ?></td>
                                        </tr>
                                        <?php if ($empIDPage->getDateFired()) : ?>
                                        <tr>
                                            <th>Дата звільнення</th>
                                            <td><?= $empIDPage->getDateFired(); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <th>Підстава прийняття</th>
                                            <td><?= $empIDPage->getAdmissionBasis(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="right-top">

                    
                    <div class="card p-4">
                        <h5 class="mb-3 text-center">Усі курси та стажування користувача</h5>
                        <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">№</th>

                                    <th scope="col">Назва курсів</th>
                                    <th scope="col">Назва організації</th>
                                    <th scope="col">Початок курсів</th>
                                    <th scope="col">Кінець курсів</th>
                                    <th scope="col">Нараховано часів</th>
                                    <th scope="col">Нараховано кредитів</th>
                                    <th scope="col">Стан</th>
                                    <th scope="col">Дії</th>
                                </tr>
                            </thead>

                            <tbody id="employeeTable1">
                                <?php 
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);
                                    $getAllCoursesByIDs = new ContinuingEducation($connection);
                                    $employerCoursesList = new Continuingeducationhistory($connection);
                                    $Courses = $getAllCoursesByIDs->getAllCoursesByIDs($employerCoursesList->getAllCoursesIDsByEmpID($empIDPage->getEmployerID())) ;
                                    $employerCoursesTemp = new ContinuingEducation($connection);
                                    $counter = 1;



                                    foreach ($Courses as $course)
                                    {   
                                        echo "<tr class=\"table-row\">";
                                        echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                                        echo "<td>{$course->getCourseName()}</td>";
                                        echo "<td>{$course->getOrganizationName()}</td>";
                                        echo "<td>{$course->getStartingDate()}</td>";
                                        echo "<td>{$course->getEndingDate()}</td>";
                                        echo "<td>{$course->getHours()}</td>";
                                        echo "<td>{$course->getCredits()}</td>"; 
                                        switch($course->getCurrentStatus()) {
                                            case "Completed" : 
                                                echo "<td style=\"color:##303030;\" ><div id=\"Complited\">Завершений</div></td>";
                                                break;
                                            case "Ongoing":
                                                echo "<td style=\"color:green;\" ><div id=\"Ongoing\">Активний</div></td>";
                                                break;
                                            case "Waiting":
                                                echo "<td style=\"color:green;\" ><div id=\"Waiting\">Очікує</div></td>";
                                                break;
                                        }
                                        echo "<td style=\"border-radius:  0px 36px 36px 0px ;\">";

                                        echo "<div class=\"d-flex\">";
                                        echo "
                                            <a href=\"#\" class=\"btn custom-btn custom-col docViewBtn1 mt-2\" data-documentID=\"{$course->getDocumentID()}\" id=\"docViewBtn1\" data-bs-toggle=\"tooltip\" title=\"Переглянути документ\">
                                                
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                                    <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                                                </svg>
                                            </a>    
                                            <a href=\"#\" class=\"btn custom-btn custom-col docViewBtn2 mt-2\" data-documentID=\"{$course->getcertificateID()}\" id=\"docViewBtn2\" title=\"Переглянути сертифікат\" data-bs-toggle=\"tooltip\">
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                                    <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                                                </svg>
                                            </a>";

                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                ?>

                            </tbody>
                            
                        </table>
                        </div>


                    </div>

                </div>

                <div class="right-middle">
                    <?php $currentYear = date('Y'); ?>

                    <div class="card p-4">
                        <h5 class="mb-3 text-center">План із атестації співробітника</h5>                
                        <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col"><?php echo $currentYear - 5; ?></th>
                                    <th scope="col"><?php echo $currentYear - 4; ?></th>
                                    <th scope="col"><?php echo $currentYear - 3; ?></th>
                                    <th scope="col"><?php echo $currentYear - 2; ?></th>
                                    <th scope="col"><?php echo $currentYear - 1; ?></th>
                                    <th scope="col" id="currentYear"><?php echo $currentYear; ?></th>
                                    <th scope="col"><?php echo $currentYear + 1; ?></th>
                                    <th scope="col"><?php echo $currentYear + 2; ?></th>
                                    <th scope="col"><?php echo $currentYear + 3; ?></th>
                                    <th scope="col"><?php echo $currentYear + 4; ?></th>
                                    <th scope="col"><?php echo $currentYear + 5; ?></th>
                                    <th scope="col">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="accreditationTable">
                                <?php 
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);
                                    $Accred = new Accreditation($connection);
                                    $AccreditationList[] = new Accreditation($connection);
                                    $AccreditationList = $Accred->GetByID($connection, $empIDPage->getEmployerID()) ;
                                    $counter = 1;
                                    $oldestYear = $currentYear - 5;
                                    $newestYear = $currentYear + 5;

                                    foreach ($AccreditationList as $Accreditation)
                                    {   
                                        echo "<tr class=\"table-row\">";
                                        echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\">" . $counter++ . "</th>";
                                        
                                        for ($i = $oldestYear; $i <= $newestYear; $i++) {
                                            if ($Accreditation->isAccreditedYear($i)) {
                                                if($i == $currentYear){
                                                    echo "<td id=\"currentYear\"> <div class=\"AccredInfo\">" . $Accreditation->outputCategory($i) . "<div></td>";
                                                } else {
                                                    echo "<td><div class=\"AccredInfo\">" . $Accreditation->outputCategory($i) . "<div></td>";
                                                }

                                            } else {
                                                if($i == $currentYear){
                                                    echo "<td id=\"currentYear\"></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            }
                                        }
                                    
                                        echo "<td style=\"border-radius:  0px 36px 36px 0px ;\">";
                                        echo "<div class=\"d-flex\">";
                                        echo "<button type=\"button\" class=\"editEmployerBtn \" 
                                                data-employer-id=\"{$Accreditation->getEmployerID()}\"
                                                data-accreditation-id=\"{$Accreditation->getAccreditationID()}\"
                                                data-accreditation-plan='" . json_encode($Accreditation->getAccreditationPlan()) . "'
                                                data-document-years='" . json_encode($Accreditation->getDocumentYears()) . "'
                                                data-finish-day='" . json_encode($Accreditation->getFinishDay()) . "'
                                                data-expirience-years=\"{$Accreditation->getExperienceYears()}\"
                                                data-emp-name=\"{$emp->getEmpNameByID($Accreditation->getEmployerID())}\"
                                                data-emp-cat=\"{$Accreditation->currentCategory()}\"
                                                
                                                data-bs-toggle=\"modal\" data-bs-target=\"#EditAccreditationModal\"
                                                title=\"Переглянути більш інформації\">
                                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                                <path d=\"M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z\"/>
                                                </svg>
                                                </button>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                ?>
                            </tbody>
                        </table>
                        </div>

                    </div>

                    <script>
                        document.querySelectorAll('.no-click').forEach(element => {
                        element.addEventListener('click', event => {
                            event.stopPropagation();
                            });
                        });

                    </script>

                    <div class="card p-4" style="margin-top: 20px;">
                        <h5 class="mb-3 text-center">Посади співробітника</h5>   
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Назва посади</th>
                                        <th scope="col">Рівень</th>
                                        <th scope="col">Ставка</th>
                                        <th scope="col">Вимоги до посади</th>
                                    </tr>
                                </thead>
                                <tbody id="positionsTable">
                                    <?php
                                        ini_set('display_errors', 1);
                                        ini_set('display_startup_errors', 1);
                                        error_reporting(E_ALL);


                                        $employerID = $empIDPage->getEmployerID();
                                        $employerPosition = new EmployerPosition($connection);
                                        $PosIDsArray = $employerPosition->getByEmployerID($employerID);
                                        $PosArray = [];
                                        $tempPosition = new Position($connection);
                                        $counter = 1;
                                        foreach ($PosIDsArray as $PosID)
                                        {   
                                            $tempPosition->loadByID($PosID);
                                            echo "<tr class=\"table-row\">";
                                            echo "<th scope=\"row\" >" . $counter++ . "</th>";
                                            echo "<td>{$tempPosition->getPositionName()}</td>";
                                            echo "<td>{$tempPosition->getPositionLevel()}</td>";
                                            echo "<td>{$tempPosition->getSalary()}</td>";
                                            echo "<div class=\"d-flex\">";
                                            echo "<td style=\"border-radius:  0px 36px 36px 0px ;\">{$tempPosition->getPositionRequirements()}</td> ";
                                            echo "</div>";

                                            echo "</td>";

                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>


                </div>

                <div class="right-bottom">


                    <div class="card p-4" style="margin-top: 20px;">
                        <h5 class="mb-3 text-center">Усі документи користувача</h5> 
                        
                        <?php  
                            require_once __DIR__ . "/../partials/personalPage/searchBar.php";
                        ?>

                        <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">№</th>
                                            <th scope="col">Номер <br>документу</th>
                                            <th scope="col">Назва документу</th>
                                            <th scope="col">Категорія</th>
                                            <th scope="col">Призначення</th>
                                            <th scope="col">Тип <br>документу</th>
                                            <th scope="col">Дії</th>
                                        </tr>
                                    </thead>
                                    <tbody id="documentTable">
                                        <?php 

                                            ini_set('display_errors', 1);
                                            ini_set('display_startup_errors', 1);
                                            error_reporting(E_ALL);

                                            $tempDoc = new Document($connection);
                                            $documentList[] = new Document($connection);
                                            $documentList = $tempDoc->getAllDocumentsByOwnerID($empIDPage->getEmployerID()) ;
                                            $counter = 1;

                                            foreach ($documentList as $document)
                                            {   
                                                echo "<tr class=\"table-row\">";
                                                echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                                                echo "<td>{$document->getDocumentID()}</td>";
                                                echo "<td>{$document->getDocumentName()}</td>";
                                                echo "<td>{$document->getSphere()}</td>";
                                                echo "<td>{$document->getPurpose()}</td>";
                                                echo "<td>{$document->getDocType()}</td>";
                                                echo "<td style=\"border-radius:  0px 36px 36px 0px ;\">";
                                                echo "<div class=\"d-flex\">";
                                                echo "<a href=\"#\" class=\"btn custom-btn custom-col docViewBtn3 mt-2\" data-documentID=\"{$document->getDocumentID()}\" title=\"Переглянути документ\" data-bs-toggle=\"tooltip\" id=\"docViewBtn3\">
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 22\" class=\"icon_white no-click\">
                                                        <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                                                    </svg>
                                                </a>";
                                                echo "</div>";

                                                echo "</td>";

                                                echo "</tr>";
                                            }


                                        ?>

                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>

                        <script>

                        document.addEventListener('DOMContentLoaded', () => {
                            document.getElementById('documentTable').addEventListener('click', event => {
                                const button = event.target.closest('.docViewBtn');
                                if (button) {
                                    const docID = button.getAttribute('data-documentID');
                                    window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
                                }
                            });
                        });

                        </script>




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