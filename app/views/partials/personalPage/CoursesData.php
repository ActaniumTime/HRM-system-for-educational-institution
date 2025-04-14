
<div class="card">

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
            </tr>
        </thead>

        <tbody id="employeeTable">
            <?php 
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $employerCourses [] = new ContinuingEducation($connection);
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
    event.stopPropagation(); // Останавливает дальнейшую обработку события
    });
});

</script>