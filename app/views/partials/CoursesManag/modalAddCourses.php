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
                            <label for="employeeSelect" class="form-label" name="empID_AddForm">Оберить співробітника </label>
                            <select id="employeeSelect" class="form-control" name="empID_AddForm">
                                <option value="">Введить ПІБ...</option>
                                <?php 
                                    $employers = $emp->getAll($connection);
                                    foreach ($employers as $employer) {
                                        echo "<option value=\"" . $employer->getEmployerID() . "\" name=\"empID_AddForm\">" . htmlspecialchars($employer->getEmpNameByID($employer->getEmployerID())) . "</option>";
                                    }
        
                                ?>
                            </select>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Назва курсів</label>
                            <input type="text" class="form-control" id="courseName_AddForm" name="courseName_AddForm" placeholder="Введить назву курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Назва організації</label>
                            <input type="text" class="form-control" id="organizationName_AddForm" name="organizationName_AddForm" placeholder="Введить назву організатору..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата початку курсів</label>
                            <input type="date" class="form-control" id="startingDate_AddForm" name="startingDate_AddForm" placeholder="Оберіть дату початку прохождення курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата закінчення курсів</label>
                            <input type="date" class="form-control" id="endingDate_AddForm" name="endingDate_AddForm" placeholder="Оберіть дату закінчення курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Кілкість годин</label>
                            <input type="text" class="form-control" id="hours_AddForm" name="hours_AddForm" placeholder="Введить кількість годин..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Кілкість кредитів</label>
                            <input type="text" class="form-control" id="credits_AddForm" name="credits_AddForm" placeholder="Введить кількість нарахованних кредитів..." required>
                        </div>
                    
                        <div class="file-attach">
                            <div class="mb-3 col-md-12" >
                                <label for="uploadPDF" class="form-label">Додати файл із прохожденням курсів/стажировки</label>
                                <input type="file" class="form-control" id="uploadPDF_AddForm" name="confirmationFile_AddForm" accept=".pdf" required >
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                    <input type="text" class="form-control" id="docName_AddForm" name="docName_AddForm" placeholder="Постанова про створення позиції..." required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Ради</label>
                                    <select class="form-control" id="sphere_AddForm" name="sphere_AddForm" required placeholder="Адмінастративна...">
                                        <option value="Адмінастративна">Адмінастративна</option>
                                        <option value="Навчальна">Навчальна</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currentSalary" class="form-label">Призначення</label>
                                    <input type="text" class="form-control" id="purpose_AddForm" name="purpose_AddForm" placeholder="Наказ про створення нової посади..." required >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Тип документа</label>
                                    <select class="form-control" id="docType_AddForm" name="docType_AddForm" required>
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

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/modals/AddCourse.php', {
        method: 'POST',
        body: formData, 
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                closeAllModals();
                showSuccessAddCourseModal();
                
            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});


</script>
