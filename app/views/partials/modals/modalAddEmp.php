<div class="modal fade" id="AddEmployerModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employerModalLabel">Додати співробітника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employerForm_AddForm" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img id="employerAvatarPreview" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                                <input type="file" id="employerAvatar111" name="avatar" accept="image/*" class="form-control mt-3">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="accessLevelID" class="form-label">Рівень доступу</label>
                            <select class="form-select" id="accessLevelID_AddForm" name="accessLevelID">
                                <option value="2">HR-менеджер</option>
                                <option value="3">Співробітник</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Пароль доступу</label>
                            <input type="text" class="form-control" id="password_AddForm" name="password" placeholder="Введить пароль для співроботника...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="name_AddForm" name="name" placeholder="Введить ім'я...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="surname" class="form-label">Призвище</label>
                            <input type="text" class="form-control" id="surname_AddForm" name="surname" placeholder="Введить призвище...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fathername" class="form-label">По батькові</label>
                            <input type="text" class="form-control" id="fathername_AddForm" name="fathername" placeholder="Введить по батькові...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">День народження</label>
                            <input type="date" class="form-control" id="birthday_AddForm" name="birthday" placeholder="Обреріть дату народження...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Стать</label>
                            <select class="form-select" id="gender_AddForm" name="gender" placeholder="Оберіть стать...">
                                <option value="Male">Чоловік</option>
                                <option value="Female">Жінка</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">ID картка</label>
                            <input type="text" class="form-control" id="passportID_AddForm" name="passportID" placeholder="Введить номер паспорта...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="homeAddress" class="form-label">Домашня адреса</label>
                            <input type="text" class="form-control" id="homeAddress_AddForm" name="homeAddress" placeholder="Введить домашню адресу...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_AddForm" name="email" placeholder="Введить електрону скриньку...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phoneNumber" class="form-label">Телефонний номер</label>
                            <input type="text" class="form-control" id="phoneNumber_AddForm" name="phoneNumber" placeholder="Введить номер телефону...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Циклова комісія</label>
                            <select class="form-select" id="department_AddForm" name="department" placeholder="Оберить коміссію/кафедру...">
                                <option value="121. Інженерія программного забезпечення">121. Інженерія программного забезпечення</option>
                                <option value="122. Ком'ютерні науки">122. Ком'ютерні науки</option>
                                <option value="022. Дизайн">022. Дизайн</option>
                                <option value="Администрация коледжу">Администрация коледжу</option>
                                <option value="ЦК математично-природничих дисциплін">ЦК математично-природничих дисциплін</option>
                                <option value="ЦК гуманітарних дисциплін">ЦК гуманітарних дисциплін</option>
                                <option value="ЦК іноземних мов">ЦК іноземних мов</option>
                                <option value="ЦК соціально-економічних дисциплін">ЦК соціально-економічних дисциплін</option>
                                <option value="ЦК фізичного виховання і безпеки життєдіяльності">ЦК фізичного виховання і безпеки життєдіяльності</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата прийняття на работу</label>
                            <input type="date" class="form-control" id="dateAccepted_AddForm" name="dateAccepted" placeholder="оберіть дату прийняття на роботу...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Дата звільнення</label>
                            <input type="date" class="form-control" id="dateFired_AddForm" name="dateFired" placeholder="Оберіть дату звільнення...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="currentStatus" class="form-label">Поточний статус </label>
                            <select class="form-select" id="currentStatus_AddForm" name="currentStatus" placeholder="Введить поточний статус...">
                                <option value="Active">Вже працює</option>
                                <option value="Inactive">Не працює</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="employmentType" class="form-label">Тип зайнятості</label>
                            <select class="form-select" id="employmentType_AddForm" name="employmentType" placeholder="Оберіть тип зайнятості...">
                                <option value="Full-time">Повний день</option>
                                <option value="Part-time">Пів дня</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="employmentType" class="form-label">Категорія</label>
                            <select class="form-select" id="category_AddForm" name="category" placeholder="Оберіть тип зайнятості...">
                                <option value="1">Спеціаліст</option>
                                <option value="2">Спеціаліст другої категорії</option>
                                <option value="3">Спеціаліст першої категорії</option>
                                <option value="4">Спеціаліст вищої категорії</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Кількість років у поточної категорії</label>
                            <input type="text" class="form-control" id="categoryAge_AddForm" name="categoryAge" placeholder="Введить кілкість років у поточної категорії...">
                        </div>
                        
                        <div class="file-attach">
                            <div class="mb-3 col-md-12" >
                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
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
                                        <option value="Контракт про працевлаштування">Контракт про працевлаштування</option>
                                        <option value="Наказ із звільнення">Звільнення</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="submit" class="btn btn-primary" form="employerForm_AddForm">Додати співроботника</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('employerAvatar111').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('employerAvatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});

document.getElementById('employerForm_AddForm').addEventListener('submit', function (e) {
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
                closeAllModals();
                showSuccessAddEmpModal();
                setTimeout(() => {
                location.reload();
            }, 3000);
            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});
</script>
