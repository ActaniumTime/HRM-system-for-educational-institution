<div class="modal fade" id="EditAccreditationModal" tabindex="-1" aria-labelledby="accreditationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accreditationModalLabel">Перегляд атестації співробітника</h5>
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
                                                <a href="#" class="btn custom-btn custom-col docViewBtn  " data-documentID="" id="docViewBtn" title="Переглянути документ" data-bs-toggle="tooltip" style="display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                    </svg>
                                                    Посвідчення
                                                </a>
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
                                                <a href="#" class="btn custom-btn custom-col docViewBtn  " data-documentID="" id="docViewBtn" title="Переглянути документ" data-bs-toggle="tooltip" style="display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                    </svg>
                                                    Посвідчення
                                                </a>
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
                                                <a href="#" class="btn custom-btn custom-col docViewBtn  " data-documentID="" id="docViewBtn" title="Переглянути документ" data-bs-toggle="tooltip" style="display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                    </svg>
                                                    Посвідчення
                                                </a>
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
                                                <a href="#" class="btn custom-btn custom-col docViewBtn  " data-documentID="" id="docViewBtn" title="Переглянути документ" data-bs-toggle="tooltip" style="display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                    </svg>
                                                    Посвідчення
                                                </a>
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
                                                <a href="#" class="btn custom-btn custom-col docViewBtn  " data-documentID="" id="docViewBtn" title="Переглянути документ" data-bs-toggle="tooltip" style="display: block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg\" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 22" class="icon_white no-click">
                                                        <path d="m23.705,18.549c-.896-1.325-2.959-3.549-6.705-3.549s-5.81,2.224-6.705,3.549c-.391.577-.392,1.323,0,1.902.896,1.325,2.96,3.549,6.706,3.549s5.809-2.224,6.705-3.549c.391-.578.391-1.324,0-1.902Zm-6.705,2.951c-1.105,0-2-.895-2-2s.895-2,2-2,2,.895,2,2-.895,2-2,2Zm-8.362.072c-.852-1.262-.851-2.888.001-4.146,1.116-1.651,3.689-4.427,8.361-4.427,3.311,0,5.568,1.395,7,2.796V5c0-2.761-2.239-5-5-5H5C2.239,0,0,2.239,0,5v13c0,2.761,2.239,5,5,5h4.797c-.489-.506-.872-1.004-1.159-1.428Zm2.362-16.572h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm0,5h7c.552,0,1,.448,1,1s-.448,1-1,1h-7c-.552,0-1-.448-1-1s.448-1,1-1Zm-4.5-5.5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,5c.828,0,1.5.672,1.5,1.5s-.672,1.5-1.5,1.5-1.5-.672-1.5-1.5.672-1.5,1.5-1.5Zm0,8c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                                                    </svg>
                                                    Посвідчення
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
            </div>
        </div>
    </div>
</div>
