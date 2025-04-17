
<div class="modal fade" id="employerModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="employerModalLabel">Редагування співроботника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employerForm"> 

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img id="employerAvatar" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                                </div>
                            </div>
                        </div>
  
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="employerID" class="form-label">ID співроботника</label>
                            <input type="text" class="form-control" id="employerID" name="employerID" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="accessLevelID" class="form-label">Рівень доступу</label>
                            <select class="form-select" id="accessLevelID" name="accessLevelID" placeholder="Оберіть рівень доступу...">
                                <option value="1">Администратор</option>
                                <option value="2">Менеджер</option>
                                <option value="3">Співроботник</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Ім'я</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Введить ім'я...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="surname" class="form-label">Призвище</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Введить призвище...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fathername" class="form-label">По батькові</label>
                            <input type="text" class="form-control" id="fathername" name="fathername" placeholder="Введить по батькові...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">День народження</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Обреріть дату народження...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Стать</label>
                            <select class="form-select" id="gender" name="gender" placeholder="Оберіть стать...">
                                <option value="Male">Чоловік</option>
                                <option value="Female">Жінка</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">ID картка</label>
                            <input type="text" class="form-control" id="passportID" name="passportID" placeholder="Введить номер паспорта...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="homeAddress" class="form-label">Домашня адреса</label>
                            <input type="text" class="form-control" id="homeAddress" name="homeAddress" placeholder="Введить домашню адресу...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Введить електрону скриньку...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phoneNumber" class="form-label">Телефонний номер</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Введить номер телефону...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Коміссія/кафедра</label>
                            <input type="text" class="form-control" id="department" name="department"  placeholder="Оберить коміссію/кафедру...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Дата прийняття на работу</label>
                            <input type="date" class="form-control" id="dateAccepted" name="dateAccepted" placeholder="оберіть дату прийняття на роботу...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="currentStatus" class="form-label">Поточний статус (НЕ ЗАБУДЬ ВИДАЛИТИ)</label>
                            <input type="text" class="form-control" id="currentStatus" name="currentStatus" placeholder="Введить поточний статус...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Дата звільнення</label>
                            <input type="date" class="form-control" id="dateFired" name="dateFired" placeholder="Оберіть дату звільнення...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="admissionBasis" class="form-label">Прийняття (ПЕРЕРОБИ ДЛЯ ДОДАВАННЯ ФАЙЛУ ПРО ПРИЙНЯТТЯ НА РАБОТУ)</label>
                            <input type="text" class="form-control" id="admissionBasis" name="admissionBasis">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="employmentType" class="form-label">Тип зайнятості</label>
                            <input type="text" class="form-control" id="employmentType" name="employmentType" placeholder="Оберіть тип зайнятості...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                <button type="submit" class="btn btn-primary" form="employerForm">Зберегти зміни</button>

            </div>
        </div>
    </div>
</div>

