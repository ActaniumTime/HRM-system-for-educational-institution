
<div class="card" style="margin-top: 25px;">

    <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Аватар</th>
                <th scope="col">Назва курсів</th>
                <th scope="col">Назва організації</th>
                <th scope="col">Початок курсів</th>
                <th scope="col">Кінець курсів</th>
                <th scope="col">Кількість часів з</th>
                <th scope="col">Кількість кредитів</th>
                <th scope="col">Дії</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            <?php 
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $Courses [] = new ContinuingEducation($connection);
                $CourseTemp = new ContinuingEducation($connection);
                $Courses = $CourseTemp->getAllCourses($connection);
                $counter = 1;


                foreach ($Courses as $course)
                {   
                    echo "<tr class=\"table-row\">";
                    echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\" >" . $counter++ . "</th>";
                    echo "<td><img src=\"../../../Files/photos/{$emp->getAvatarByID($course->getEmployerID())}\" alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\"  id=\"employerAvatar\"></td>";
                    echo "<td>{$course->getCourseName()}</td>";
                    echo "<td>{$course->getOrganizationName()}</td>";
                    echo "<td>{$course->getStartingDate()}</td>";
                    echo "<td>{$course->getEndingDate()}</td>";
                    echo "<td>{$course->getHours()}</td>";
                    echo "<td>{$course->getCredits()}</td>"; 
                    echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";
                    echo "<button type=\"button\" class=\"editEmployerBtn \" 
                            data-employer-avatar=\"../../../Files/photos/{$emp->getAvatarByID($course->getEmployerID())}\"
                            data-employer-id=\"{$course->getEmployerID()}\"
                            data-course-id=\"{$course->getCourseID()}\"
                            data-course-name=\"{$course->getCourseName()}\"
                            data-course-rganization-name=\"{$course->getOrganizationName()}\"
                            data-course-start=\"{$course->getStartingDate()}\"
                            data-course-end=\"{$course->getEndingDate()}\"
                            data-course-document=\"{$course->getDocumentID()}\"
                            data-course-sectificate=\"{$course->getDocumentID()}\"
                            data-course-hours=\"{$course->getHours()}\"
                            data-course-credit=\"{$course->getCredits()}\"
                            data-bs-toggle=\"modal\" data-bs-target=\"#employerModal\"
                            title=\"Редагувати дані співробітника\">
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                            <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                            </svg>


                            </button>";
                    
                    echo "<button type=\"button\" class=\"Delete-button\"
                            data-employer-avatar=\"../../../Files/photos/{$emp->getAvatarByID($course->getEmployerID())}\"
                            data-employer-id=\"{$course->getEmployerID()}\"
                            data-course-id=\"{$course->getCourseID()}\"
                            data-course-name=\"{$course->getCourseName()}\"
                            data-course-rganization-name=\"{$course->getOrganizationName()}\"
                            data-course-start=\"{$course->getStartingDate()}\"
                            data-course-end=\"{$course->getEndingDate()}\"
                            data-course-document=\"{$course->getDocumentID()}\"
                            data-course-sectificate=\"{$course->getDocumentID()}\"
                            data-course-hours=\"{$course->getHours()}\"
                            data-course-credit=\"{$course->getCredits()}\"
                            data-bs-toggle=\"modal\"
                            data-bs-target=\"#deleteEmployerModal\"
                            title=\"Видалити співробітника\">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z\"/>
                            </svg>

                        </button>";

                    echo "<button type=\"button\" class=\"Info-button\" 
                            data-employer-id=\"{$course->getEmployerID()}\"
                            data-bs-toggle=\"modal\"
                            title=\"До сторінки співробітника \">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z\"/>
                            </svg>


                        </button>";

                    echo "<button type=\"button\" class=\"Info-button\" 
                            data-employer-id=\"{$course->getEmployerID()}\"
                            data-bs-toggle=\"modal\"
                            title=\"Керування позиціями та ЗП \">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m9.54,1.717c.486-.453.96-1.063.96-1.717h-4c0,.654.474,1.264.96,1.717-1.653.64-3.46,2.584-3.46,4.363,0,1.61,1.233,2.919,2.75,2.919h3.5c1.517,0,2.75-1.31,2.75-2.919,0-1.78-1.807-3.724-3.46-4.363Zm13.609,6.963c-.515-.469-1.186-.712-1.878-.678-.697.032-1.339.334-1.794.835l-3.541,3.737c.032.21.065.42.065.638,0,2.083-1.555,3.876-3.617,4.17l-4.241.606-.283-1.979,4.241-.606c1.084-.155,1.9-1.097,1.9-2.191,0-1.22-.993-2.213-2.213-2.213H3c-1.654,0-3,1.346-3,3v7c0,1.654,1.346,3,3,3h9.664l10.674-11.655c.948-1.062.862-2.707-.189-3.665Zm-7.898-3.931l-1.414-1.414,2.75-2.75c.779-.78,2.049-.78,2.828,0l2.752,2.752-1.414,1.414-1.752-1.752v3.661c-.361.219-.69.488-.976.801l-1.024,1.081V3l-1.75,1.75\"/>
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



<script>
    document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation(); // Останавливает дальнейшую обработку события
        });
    });

</script>

