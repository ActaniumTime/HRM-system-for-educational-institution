<div class="modal fade" id="EditAccreditationModal" tabindex="-1" aria-labelledby="accreditationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accreditationModalLabel">Редактирование аккредитации</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="EditAccreditationForm">
                    <div class="row" style="border-bottom: 1px solid #dee2e6; padding-bottom: 10px; margin-bottom: 10px;">
                        <div class="mb-3 col-md-6">
                            <label for="teacherName" class="form-label">ID accreditation</label>
                            <input type="text" class="form-control" id="accreditationID" name="accreditationID">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="teacherName" class="form-label">ID співробітника</label>
                            <input type="text" class="form-control" id="employerIDmodal" name="employerIDmodal">
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 1px solid #dee2e6; padding-bottom: 10px; margin-bottom: 10px;">
                        <div class="mb-3 col-md-6">
                            <label for="teacherName" class="form-label">ПІБ співробітника</label>
                            <input type="text" class="form-control" id="teacherNameModal" name="teacherNameModal" >
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="currentCategory" class="form-label">Поточна категорія</label>
                            <input type="text" class="form-control" id="currentCategoryModal" name="currentCategoryModal" >
                        </div>
                        
                        <div class="mb-3 col-md-3">
                            <label for="currentCategory" class="form-label">Поточний стаж</label>
                            <input type="text" class="form-control" id="currentYearModal" name="currentYearModal" >
                        </div>

                    </div>

                    <div class="row">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Спеціаліст
                                </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal1" name="accreditationYearModal1">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal1" name="accreditationDateModal1">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Дії</label>
                                                <a href="#" class="docViewBtn" data-documentID="">
                                                    <button type="button" class="editEmployerBtn" id="docViewBtn"
                                                        data-documentID = ""
                                                        title="Переглянути документ">
                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                            <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                        </svg>
                                                        
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                                <input type="file" class="form-control" id="uploadPDFModal1" name="confirmationFileModal1" accept=".pdf"  >
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                                    <input type="text" class="form-control" id="docNameModal1" name="docNameModal1" placeholder="Постанова про створення позиції..." >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Ради</label>
                                                    <select class="form-control" id="sphereModal1" name="sphereModal1"  placeholder="Адмінастративна...">
                                                        <option value="Адмінастративна">Адмінастративна</option>
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purposeModal1" name="purposeModal1" placeholder="Наказ про створення нової посади..."  >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docTypeModal1" name="docTypeModal1" >
                                                        <option value="Сертифікат проходження аккредитації">Сертифікат проходження аккредитації</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    Спеціаліст другої категорії
                                </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal2" name="accreditationYearModal2">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal2" name="accreditationDateModal2">
                                            </div>
                       
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Дії</label>
                                                <a href="#" class="docViewBtn" data-documentID="">
                                                    <button type="button" class="editEmployerBtn" id="docViewBtn"
                                                        data-documentID = ""
                                                        title="Переглянути документ">
                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                            <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                        </svg>
                                                        
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                                <input type="file" class="form-control" id="uploadPDFModal2" name="confirmationFileModal2" accept=".pdf"  >
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
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purposeModal2" name="purposeModal2" placeholder="Наказ про створення нової посади..."  >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docTypeModal2" name="docTypeModal2" >
                                                        <option value="Сертифікат проходження аккредитації">Сертифікат проходження аккредитації</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Спеціаліст першої категорії
                                </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal3" name="accreditationYearModal3">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal3" name="accreditationDateModal3">
                                            </div>
                                        
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Дії</label>
                                                <a href="#" class="docViewBtn" data-documentID="">
                                                    <button type="button" class="editEmployerBtn" id="docViewBtn"
                                                        data-documentID = ""
                                                        title="Переглянути документ">
                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                            <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                        </svg>
                                                        
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                                <input type="file" class="form-control" id="uploadPDFModal3" name="confirmationFileModal3" accept=".pdf"  >
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                                    <input type="text" class="form-control" id="docNameModal3" name="docNameModal3" placeholder="Постанова про створення позиції..." >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Ради</label>
                                                    <select class="form-control" id="sphereModal3" name="sphereModal3"  placeholder="Адмінастративна...">
                                                        <option value="Адмінастративна">Адмінастративна</option>
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purposeModal3" name="purposeModal3" placeholder="Наказ про створення нової посади..."  >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docTypeModal3" name="docTypeModal3" >
                                                        <option value="Сертифікат проходження аккредитації">Сертифікат проходження аккредитації</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Спеціаліст висщої категорії
                                </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal4" name="accreditationYearModal4">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal4" name="accreditationDateModal4">
                                            </div>
                                        
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Дії</label>
                                                <a href="#" class="docViewBtn" data-documentID="">
                                                    <button type="button" class="editEmployerBtn" id="docViewBtn"
                                                        data-documentID = ""
                                                        title="Переглянути документ">
                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                            <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                        </svg>
                                                        
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                                <input type="file" class="form-control" id="uploadPDFModal4" name="confirmationFileModal4" accept=".pdf"  >
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                                    <input type="text" class="form-control" id="docNameModal4" name="docNameModal4" placeholder="Постанова про створення позиції..." >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Ради</label>
                                                    <select class="form-control" id="sphereModal4" name="sphereModal4"  placeholder="Адмінастративна...">
                                                        <option value="Адмінастративна">Адмінастративна</option>
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purposeModal4" name="purposeModal4" placeholder="Наказ про створення нової посади..."  >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docTypeModal4" name="docTypeModal4" >
                                                        <option value="Сертифі кат проходження аккредитації">Сертифікат проходження аккредитації</option>
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
                                    Верифікація вищої категорії
                                </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        
                                        <div class="row">
                                            <h4>Найближча верифікація</h4>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal5" name="accreditationYearModal5">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal5" name="accreditationDateModal5">
                                            </div>
                                        
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Дії</label>
                                                <a href="#" class="docViewBtn" data-documentID="">
                                                    <button type="button" class="editEmployerBtn" id="docViewBtn"
                                                        data-documentID = ""
                                                        title="Переглянути документ">
                                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                            <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                        </svg>
                                                        
                                                    </button>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <h4>Наступна верифікація</h4>

                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="text" class="form-control" id="accreditationYearModal6" name="accreditationYearModal6">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDateModal6" name="accreditationDateModal6">
                                            </div>

                                        </div>

                                        <div class="file-attach">
                                            <div class="mb-3 col-md-12" >
                                                <label for="uploadPDF" class="form-label">Додати файл із контрактом</label>
                                                <input type="file" class="form-control" id="uploadPDFModal5" name="confirmationFileModal5" accept=".pdf"  >
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                                    <input type="text" class="form-control" id="docNameModal5" name="docNameModal5" placeholder="Постанова про створення позиції..." >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Ради</label>
                                                    <select class="form-control" id="sphereModal5" name="sphereModal5"  placeholder="Адмінастративна...">
                                                        <option value="Адмінастративна">Адмінастративна</option>
                                                        <option value="Навчальна">Навчальна</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="currentSalary" class="form-label">Призначення</label>
                                                    <input type="text" class="form-control" id="purposeModal5" name="purposeModal5" placeholder="Наказ про створення нової посади..."  >
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="department" class="form-label">Тип документа</label>
                                                    <select class="form-control" id="docTypeModal5" name="docTypeModal5" >
                                                        <option value="Сертифікат проходження аккредитації">Сертифікат проходження аккредитації</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row" style="border-bottom: 1px solid #dee2e6; padding-bottom: 10px; margin-bottom: 10px;">
                        


                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary" id="saveAccreditation">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('EditAccreditationModal').addEventListener('click', event => {
        const button = event.target.closest('.docViewBtn');
        if (button) {
            const docID = button.getAttribute('data-documentID');
            window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
        }
    });
});

</script>