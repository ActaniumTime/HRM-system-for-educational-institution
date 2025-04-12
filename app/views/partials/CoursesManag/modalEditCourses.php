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
                        <div class="mb-3 col-md-2">
                            <label for="password" class="form-label">ID курсів</label>
                            <input type="text" class="form-control" id="courseID_EditForm" name="courseID_EditForm" placeholder="Введить назву курсів..." required>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="password" class="form-label">ID користувача</label>
                            <input type="text" class="form-control" id="empID_EditForm" name="empID_EditForm" placeholder="Введить назву курсів..." required>
                        </div>

                        <div class="mb-3 col-md-8">
                            <label for="password" class="form-label">Користувач</label>
                            <input type="text" class="form-control" id="empName_EditForm" name="empName_EditForm" placeholder="Введить назву курсів..." required>
                        </div>

                        <div class="mb-3" style="border-bottom: 1px solid #dee2e6;"></div>

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
                            <label for="dateAccepted" class="form-label">Поточний статус курсів</label>
                            <input type="text" class="form-control" id="Status_EditForm" name="Status_EditForm" placeholder="Оберіть дату закінчення курсів..." required>
                        </div>

                        <div class="mb-3" style="border-bottom: 1px solid #dee2e6;"></div>

                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Кілкість годин</label>
                            <input type="text" class="form-control" id="hours_EditForm" name="hours_EditForm" placeholder="Введить кількість годин..." required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Кілкість кредитів</label>
                            <input type="text" class="form-control" id="credits_EditForm" name="credits_EditForm" placeholder="Введить кількість нарахованних кредитів..." required>
                        </div>
                        
                        <div class="mb-3" style="border-bottom: 1px solid #dee2e6;"></div>

                        <div class="mb-3">
                            <label for="passportID" class="form-label">Дії</label><br>
                                <a href="#" class="btn custom-btn custom-col docViewBtn1 mt-2" data-documentID="" id="docViewBtn1">
                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                    </svg>
                                    Переглянути документ
                                </a>    
                                <a href="#" class="btn custom-btn custom-col docViewBtn2 mt-2" data-documentID="" id="docViewBtn2">
                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                    </svg>
                                    Переглянути сертифікат
                                </a>  
                        </div>

                        <div class="mb-3" style="border-bottom: 1px solid #dee2e6;"></div>
                    
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
                                            <input type="file" class="form-control" id="uploadPDF_EditForm" name="confirmationFile_EditForm" accept=".pdf"  >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docName_EditForm" name="docName_EditForm" placeholder="Постанова про створення позиції..." >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphere_EditForm" name="sphere_EditForm"  placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>
                                                    <option value="Навчальна">Навчальна</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purpose_EditForm" name="purpose_EditForm" placeholder="Наказ про створення нової посади..."  >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docType_EditForm" name="docType_EditForm" >
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
                                            <input type="file" class="form-control" id="uploadPDF_EditForm2" name="confirmationFile_EditForm2" accept=".pdf"  >
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="employeeSelect" class="form-label">Назва документу</label>
                                                <input type="text" class="form-control" id="docName_EditForm2" name="docName_EditForm2" placeholder="Постанова про створення позиції..." >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Ради</label>
                                                <select class="form-control" id="sphere_EditForm2" name="sphere_EditForm2"  placeholder="Адмінастративна...">
                                                    <option value="Адмінастративна">Адмінастративна</option>
                                                    <option value="Навчальна">Навчальна</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="currentSalary" class="form-label">Призначення</label>
                                                <input type="text" class="form-control" id="purpose_EditForm2" name="purpose_EditForm2" placeholder="Наказ про створення нової посади..."  >
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="department" class="form-label">Тип документа</label>
                                                <select class="form-control" id="docType_EditForm2" name="docType_EditForm2" >
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
