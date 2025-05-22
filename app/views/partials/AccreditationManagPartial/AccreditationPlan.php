
<?php $currentYear = date('Y'); ?>

<div class="card" style="margin-top: 25px;">
    <div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">№</th>
                <th scope="col"></th>
                <th scope="col">ПІБ співробітника</th>
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
                $AccreditationList = $Accred->GetAll($connection);
                $counter = 1;
                $oldestYear = $currentYear - 5;
                $newestYear = $currentYear + 5;

                foreach ($AccreditationList as $Accreditation)
                {   
                    echo "<tr class=\"table-row\">";
                    echo "<th scope=\"row\" style=\"border-radius: 36px 0px 0px 36px;\">" . $counter++ . "</th>";
                    echo "<td><img src=\"../../../Files/photos/{$emp->getAvatarByID($Accreditation->getEmployerID())}\" 
                                  alt=\"User Photo\" class=\"rounded-circle\" width=\"50\" height=\"50\" id=\"employerAvatar\"></td>";
                    echo "<td>{$emp->getEmpNameByID($Accreditation->getEmployerID())}</td>"; 
                    
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
                
                    echo "<td  style=\"border-radius:  0px 36px 36px 0px ;\">";
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
                            title=\"Редагувати дані співробітника\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                            <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                            </svg>
                            </button>";
                    echo "<button type=\"button\" class=\"Info-button\" 
                            data-employer-id=\"{$Accreditation->getEmployerID()}\"
                            data-bs-toggle=\"modal\"
                            title=\"До сторінки співробітника \">
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