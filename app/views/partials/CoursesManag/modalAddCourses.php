<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employerModalLabel">Додавання курсів та стажировок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCourseModal_AddForm" enctype="multipart/form-data">

                    <div class="row">

                        <div class="mb-3">
                            <label for="employeeSelect" class="form-label">Оберить співробітника</label>
                            <select id="employeeSelect" class="form-control">
                                <option value="">Введить ПІБ...</option>
                                <?php 
                                    $employers = $emp->getAll($connection);
                                    foreach ($employers as $employer) {
                                        echo "<option value=\"" . $employer->getEmployerID() . "\">" . htmlspecialchars($employer->getEmpNameByID($employer->getEmployerID())) . "</option>";
                                    }
        
                                ?>
                            </select>
                        </div>

                    </div>


                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Назва курсів</label>
                            <input type="text" class="form-control" id="courseName_AddForm" name="courseName" placeholder="Введить назву курсів...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Назва організації</label>
                            <input type="text" class="form-control" id="organizationName_AddForm" name="organizationName" placeholder="Введить назву організатору...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата початку курсів</label>
                            <input type="date" class="form-control" id="startingDate_AddForm" name="startingDate" placeholder="Оберіть дату початку прохождення курсів...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата закінчення курсів</label>
                            <input type="date" class="form-control" id="endingDate_AddForm" name="endingDate" placeholder="Оберіть дату закінчення курсів...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Кілкість годин</label>
                            <input type="text" class="form-control" id="hours_AddForm" name="hours" placeholder="Введить кількість годин...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Кілкість кредитів</label>
                            <input type="text" class="form-control" id="credits_AddForm" name="credits" placeholder="Введить кількість нарахованних кредитів...">
                        </div>
                    
                        <div class="file-attach">
                            <div class="mb-3 col-md-12" >
                                <label for="uploadPDF" class="form-label">Додати файл із прохожденням курсів/стажировки</label>
                                <input type="file" class="form-control" id="uploadPDF" name="confirmationFile" accept=".pdf" required >
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                    <input type="text" class="form-control" id="docName" name="docName" placeholder="Постанова про створення позиції..." required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Ради</label>
                                    <select class="form-control" id="sphere" name="sphere" required placeholder="Адмінастративна...">
                                        <option value="Адмінастративна">Адмінастративна</option>
                                        <option value="Навчальна">Навчальна</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currentSalary" class="form-label">Призначення</label>
                                    <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Наказ про створення нової посади..." required >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Тип документа</label>
                                    <select class="form-control" id="docType" name="docType" required>
                                        <option value="Прохождення курсів">Прохождення курсів</option>
                                        <option value="Прохождення стажировки">Прохождення стажировки</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="submit" class="btn btn-primary" form="addCourseModal_AddForm">Додати співроботника</button>
            </div>
        </div>
    </div>
</div>

<script>

document.getElementById('addCourseModal_AddForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    formData.forEach((value, key) => {
        if (key === "dateFired_AddForm" && value === "") {
            jsonData[key] = null;
        } else {
            jsonData[key] = value;
        }
    });

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/modals/AddEmp.php', {
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
