<div class="modal fade" id="positionManagModal" tabindex="-1" aria-labelledby="positionManagModal1" aria-hidden="true">
    <div class="modal-dialog modal-xxl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="positionManagModal1">Додавання курсів та стажировок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

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
                                            <input type="file" class="form-control" id="uploadPDF_positionAddForm" name="confirmationFile_positionAddForm" accept=".pdf" required >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docName_positionAddForm" name="docName_positionAddForm" placeholder="Постанова про створення позиції..." required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphere_positionAddForm" name="sphere_positionAddForm" required placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>
                                                    <option value="Навчальна">Навчальна</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purpose_positionAddForm" name="purpose_positionAddForm" placeholder="Наказ про створення нової посади..." required >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docType_positionAddForm" name="docType_positionAddForm" required>
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

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Назва посади</th>
                            <th scope="col">Рівень</th>
                            <th scope="col">Ставка</th>
                            <th scope="col">Вимоги до посади</th>
                            <th scope="col">Дії</th>
                        </tr>
                    </thead>
                    <tbody id="positionsTable">

                    </tbody>
                    
                </table>
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

    fetch('../../../app/models/modals/AddPersonalPosition.php', {
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
