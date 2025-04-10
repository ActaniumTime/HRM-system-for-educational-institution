<div class="modal fade" id="EditCourseModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employerModalLabel">Редагування курсів та стажировок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="EditCourseModal_EditForm" enctype="multipart/form-data">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img id="employerAvatar" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">ID користувача</label>
                            <input type="text" class="form-control" id="empID_EditForm" name="courseName_EditForm" placeholder="Введить назву курсів..." required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Користувач</label>
                            <input type="text" class="form-control" id="empName_EditForm" name="courseName_EditForm" placeholder="Введить назву курсів..." required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Назва курсів</label>
                            <input type="text" class="form-control" id="courseName_EditForm" name="courseName_EditForm" placeholder="Введить назву курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Назва організації</label>
                            <input type="text" class="form-control" id="organizationName_EditForm" name="organizationName_EditForm" placeholder="Введить назву організатору..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата початку курсів</label>
                            <input type="date" class="form-control" id="startingDate_EditForm" name="startingDate_EditForm" placeholder="Оберіть дату початку прохождення курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата закінчення курсів</label>
                            <input type="date" class="form-control" id="endingDate_EditForm" name="endingDate_EditForm" placeholder="Оберіть дату закінчення курсів..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Кілкість годин</label>
                            <input type="text" class="form-control" id="hours_EditForm" name="hours_EditForm" placeholder="Введить кількість годин..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Кілкість кредитів</label>
                            <input type="text" class="form-control" id="credits_EditForm" name="credits_EditForm" placeholder="Введить кількість нарахованних кредитів..." required>
                        </div>
                        

                        <div class="row">
                            <label for="passportID" class="form-label">Дії</label><br>
                            <div class="mb-3 col">
                                <a href="#" class="btn custom-btn custom-col docViewBtn1 mt-2" data-documentID="" id="docViewBtn1">
                                    Відкрити документ
                                </a>    
                            </div>

                            <div class="mb-3 col">
                                <a href="#" class="btn custom-btn custom-col docViewBtn2 mt-2" data-documentID="" id="docViewBtn2">
                                    Відкрити сертифікат
                                </a>  
                            </div>
                        </div>


                    
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                Направління на прохождення курсів
                            </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <h6>Додати файл із направлінням на прохожденням курсів/стажировки</h6>

                                    <div class="file-attach">
                                        <div class="mb-3 col-md-12" >
                                            <label for="uploadPDF" class="form-label">Додати файл із прохожденням курсів/стажировки</label>
                                            <input type="file" class="form-control" id="uploadPDF_EditForm" name="confirmationFile_EditForm" accept=".pdf" required >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docName_EditForm" name="docName_EditForm" placeholder="Постанова про створення позиції..." required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphere_EditForm" name="sphere_EditForm" required placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>
                                                    <option value="Навчальна">Навчальна</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purpose_EditForm" name="purpose_EditForm" placeholder="Наказ про створення нової посади..." required >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docType_EditForm" name="docType_EditForm" required>
                                                    <option value="Прохождення курсів">Прохождення курсів</option>
                                                    <option value="Прохождення стажировки">Прохождення стажировки</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Сертифікат із прохождення курсів
                            </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <h6>Додати сертифікат із прохожденням курсів/стажировки</h6>

                                    <div class="file-attach">
                                        <div class="mb-3 col-md-12" >
                                            <label for="uploadPDF" class="form-label">Додати сертифікат із прохожденням курсів/стажировки</label>
                                            <input type="file" class="form-control" id="uploadPDF_EditForm2" name="confirmationFile_EditForm2" accept=".pdf" required >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docName_EditForm2" name="docName_EditForm2" placeholder="Постанова про створення позиції..." required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphere_EditForm2" name="sphere_EditForm2" required placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>
                                                    <option value="Навчальна">Навчальна</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purpose_EditForm2" name="purpose_EditForm2" placeholder="Наказ про створення нової посади..." required >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docType_EditForm2" name="docType_EditForm2" required>
                                                    <option value="Прохождення курсів">Прохождення курсів</option>
                                                    <option value="Прохождення стажировки">Прохождення стажировки</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="submit" class="btn btn-primary" form="EditCourseModal_EditForm">Оновити дані</button>
            </div>
        </div>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('EditCourseModal').addEventListener('click', event => {
        const button = event.target.closest('.docViewBtn1');
        if (button) {
            const docID = button.getAttribute('data-documentID');
            window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
        }
    });
});

document.getElementById('fakeButtonInsideLink').addEventListener('click', function (event) {
    event.preventDefault();
    event.stopPropagation();

    this.closest('a').click();
});

document.getElementById('EditCourseModal_EditForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/modals/EditCourse.php', {
        method: 'POST',
        body: formData, 
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                alert('Дані оновлені успішно!');
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
