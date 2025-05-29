
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
                            <select class="form-select" id="accessLevelID" disabled>
                                <option value="1">Директор</option>
                                <option value="2">HR-Менеджер</option>
                                <option value="3">Співробітник</option>
                            </select>
                            <input type="hidden" id="accessLevelHidden" name="accessLevelID">

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
                            <label for="department" class="form-label">Циклова комісія</label>
                            <select class="form-select" id="department" name="department" placeholder="Оберить коміссію/кафедру...">
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
                            <input type="date" class="form-control" id="dateAccepted" name="dateAccepted" placeholder="оберіть дату прийняття на роботу...">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="currentStatus" class="form-label">Поточний статус</label>
                            <select class="form-select" id="currentStatus" name="currentStatus" placeholder="Введить поточний статус...">
                                <option value="Active">Працює</option>
                                <option value="Inactive">Не працює</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Дата звільнення</label>
                            <input type="date" class="form-control" id="dateFired" name="dateFired" placeholder="Оберіть дату звільнення...">
                        </div>


                        <div class="mb-3 col-md-6">
                           <label for="employmentType" class="form-label">Тип зайнятості</label>
                            <select class="form-select" id="employmentType" name="employmentType" placeholder="Оберіть тип зайнятості...">
                                <option value="Full-time">Повна зайнятість</option>
                                <option value="Part-time">Часткова зайнятість</option>
                            </select>
                            
                        </div>

                        <div class="row">
                            <label for="admissionBasis" class="form-label">Постава із прийняття до роботи</label>
                            <div class="mb-3 col-md-2">
                                
                                
                                <input type="text" class="form-control" id="admissionBasis" name="admissionBasis">
    
                            </div>

                            <div class="mb-3 col-md-10">
                                <a href="#" class="btn custom-btn custom-col docViewBtn001" data-documentID="" id="docViewBtn001">
                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                    </svg>
                                    Переглянути посвідчення із працевлаштування
                                </a>    
                            </div>
                        </div>


                    </div>
                </form>

                <form id="updateEmpDoc">

                    <div class="accordion" id="accordionExample">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                Відновити посвідчення із працевлаштування співробітника
                            </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="file-attach">
                                        <div class="mb-3 col-md-12" >
                                            <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                            <input type="file" class="form-control" id="confirmationFileModal2" name="confirmationFileModal2" accept=".pdf"  >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docNameModal2" name="docNameModal2" placeholder="Постанова про створення позиції..." >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphereModal2" name="sphereModal2"  placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>

                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purposeModal2" name="purposeModal2" placeholder="Оновлення контракту..."  >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docTypeModal2" name="docTypeModal2" >
                                                    <option value="Контракт із працевлаштування">Контракт із працевлаштування</option>
                                                    <option value="Продовження конракту із працевлаштування<">Продовження конракту із працевлаштування</option>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                <button type="submit" class="btn btn-secondary" form="updateEmpDoc">Оновити контракт</button>
                <button type="submit" class="btn btn-primary" form="employerForm">Зберегти зміни</button>

            </div>


        </div>
    </div>
</div>
