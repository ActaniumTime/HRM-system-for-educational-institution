
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
                $AccreditationList = $Accred->GetByID($connection, $_SESSION['employer_ID']);
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