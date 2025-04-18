<div class="modal fade" id="positionManagModal" tabindex="-1" aria-labelledby="positionManagModal1" aria-hidden="true">
    <div class="modal-dialog modal-xxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="positionManagModal1">Додавання курсів та стажировок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Назва посади</th>
                    <th scope="col">Рівень</th>
                    <th scope="col">Ставка</th>
                    <th scope="col">Дії</th>
                </tr>
            </thead>
            <tbody id="positionsTable">
                <?php 

                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    // $tempHistory = new EmployerPosition($connection);
                    // $tempHistory->getByEmployerID()

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
                        echo "<td>{$position->getPositionRequirements()}</td>";
                        echo "<td class=\"d-flex\" style=\"border-radius:  0px 36px 36px 0px ;\">";
                        echo "<a href=\"#\" class=\"docViewBtn\" data-documentID=\"{$position->getDocumentID()}\">

                        
                        <button type=\"button\" class=\"editEmployerBtn \" id=\"docViewBtn6\"
                            data-positionID = \"{$position->getPositionID()}\"
                            data-documentID = \"{$position->getDocumentID()}\"
                            data-positionName = \"{$position->getPositionName()}\"
                            data-positionLevel = \"{$position->getPositionLevel()}\"
                            data-salary = \"{$position->getSalary()}\"
                            data-positionRequirments = \"{$position->getPositionRequirements()}\"
                            title=\"Переглянути документ\">
                            
                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 22\" class=\"icon_white no-click\">
                                <path d=\"m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z\"/>
                            </svg>
                            
                        </button>
                        </a>";

                        echo "<button type=\"button\" class=\"Delete-button\" 
                            data-positionID = \"{$position->getPositionID()}\"
                            data-documentID = \"{$position->getDocumentID()}\"
                            data-positionName = \"{$position->getPositionName()}\"
                            data-positionLevel = \"{$position->getPositionLevel()}\"
                            data-salary = \"{$position->getSalary()}\"
                            data-positionRequirments = \"{$position->getPositionRequirements()}\"

                            data-bs-toggle=\"modal\"
                            data-bs-target=\"#deletePositionModal\"
                            title=\"Видалити позицію\">

                            <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                            <path d=\"m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z\"/>
                            </svg>
                        </button>";

                        echo "</td>";

                        echo "</tr>";
                    }

                ?>

            </tbody>
            
        </table>
        </div>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Додати нову посаду
                        </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <form id="positionManagModal_AddForm" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="employerID" class="form-label">ID співроботника</label>
                                                <input type="text" class="form-control" id="employerID__positionAddForm" name="employerID_positionAddForm" readonly>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="name" class="form-label">Ім'я</label>
                                                <input type="text" class="form-control" id="name_positionAddForm" name="name" placeholder="Введить ім'я...">
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label for="surname" class="form-label">Призвище</label>
                                                <input type="text" class="form-control" id="surname_positionAddForm" name="surname" placeholder="Введить призвище...">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="fathername" class="form-label">По батькові</label>
                                                <input type="text" class="form-control" id="fathername_positionAddForm" name="fathername" placeholder="Введить по батькові...">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="employeeSelect" class="form-label" name="empID_positionAddForm">Оберить співробітника </label>
                                            <select id="employeeSelect" class="form-control" name="empID_positionAddForm" required>
                                                <option value="">Введить ПІБ...</option>
                                                <?php 
                                                    $tempPos = new Position($connection);
                                                    $positionsList[] = new Position($connection);
                                                    $positionsList = $tempPos->getAllPosition($connection);
                                                    foreach ($positionsList as $position) {
                                                        echo "<option value=\"" . $position->getPositionID() . "\">" .
                                                            htmlspecialchars($position->getPositionName()) . ". " .
                                                            htmlspecialchars($position->getPositionLevel()) .
                                                            "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="row">

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із прохожденням курсів/стажировки</label>
                                                <input type="file" class="form-control" id="uploadPDF_positionAddForm" name="confirmationFile_AddForm" accept=".pdf" required >
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                                    <input type="text" class="form-control" id="docName_positionAddForm" name="docName_AddForm" placeholder="Постанова про створення позиції..." required>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Ради</label>
                                                    <select class="form-control" id="sphere_positionAddForm" name="sphere_AddForm" required placeholder="Адмінастративна...">
                                                        <option value="Адмінастративна">Адмінастративна</option>
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purpose_positionAddForm" name="purpose_AddForm" placeholder="Наказ про створення нової посади..." required >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docType_positionAddForm" name="docType_AddForm" required>
                                                        <option value="Прохождення курсів">Прохождення курсів</option>
                                                        <option value="Прохождення стажировки">Прохождення стажировки</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                            Спеціаліст
                        </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="submit" class="btn btn-primary" form="positionManagModal_AddForm">Додати посаду</button>
            </div>
        </div>
    </div>
</div>

<script>

document.getElementById('positionManagModal_AddForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/modals/AddCourse.php', {
        method: 'POST',
        body: formData, 
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                alert('Сотрудник добавлен успешно!');
                location.reload();
            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});


</script>
