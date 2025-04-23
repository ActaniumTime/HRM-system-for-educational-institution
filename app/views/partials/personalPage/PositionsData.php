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


                    $employerID = $_SESSION['employer_ID'];
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