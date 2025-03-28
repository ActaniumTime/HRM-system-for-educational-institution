<div class="modal fade" id="thisYearAccred" tabindex="-1" aria-labelledby="thisYearAccredLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thisYearAccred">Отримувачі нової категорії у цьому року</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $currentYear = date('Y'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col"></th>
                                    <th scope="col">ПІБ</th>
                                    <th scope="col">Категорія</th>
                                    <th scope="col">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="employeeTable">
                                <?php 
                                    ini_set('display_errors', 1);
                                    ini_set('display_startup_errors', 1);
                                    error_reporting(E_ALL);
                                    $AccredCurYear = new Accreditation($connection);
                                    $CurrentYearAccreditationList[] = new Accreditation($connection);
                                    $CurrentYearAccreditationList = $AccredCurYear->isAccreditedYearList($connection, $currentYear);
                                    $counter = 1;

                                    foreach ($CurrentYearAccreditationList as $Accreditation)
                                    {   
                                        echo "<tr class=\"table-row\">";
                                        echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\">" . $counter++ . "</th>";
                                        echo "<td><img src=\"../../../Files/photos/{$emp->getAvatarByID($Accreditation->getEmployerID())}\" alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\" id=\"employerAvatar\"></td>";
                                        echo "<td>{$emp->getEmpNameByID($Accreditation->getEmployerID())}</td>"; 
                                        echo "<td>{$Accreditation->getCurrentCategory()}</td>"; 
                                    
                                        echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";

                                        echo "<button  type=\"button\" class=\"Info-button\" 
                                                data-employer-id=\"{$Accreditation->getEmployerID()}\"
                                                data-bs-toggle=\"modal\"
                                                title=\"До сторінки співробітника \">

                                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                                <path d=\"M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z\"/>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation();
        });
    });

</script>