
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
                $Courses = $getAllCoursesByIDs->getAllCoursesByIDs($employerCoursesList->getAllCoursesIDsByEmpID($_SESSION['employer_ID'])) ;
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