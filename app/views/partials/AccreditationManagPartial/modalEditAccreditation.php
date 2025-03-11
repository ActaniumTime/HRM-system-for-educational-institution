<div class="modal fade" id="EditAccreditationModal" tabindex="-1" aria-labelledby="accreditationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accreditationModalLabel">Редактирование аккредитации</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="EditAccreditationForm">
                    <input type="hidden" id="accreditationID" name="accreditationID">

                    <div class="row">
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">ПІБ співробітника</label>
                            <input type="text" class="form-control" id="teacherName" name="teacherName" disabled>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="currentCategory" class="form-label">Поточна категорія</label>
                            <input type="text" class="form-control" id="currentCategory" name="currentCategory" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="mb-3 col">
                                <label for="accreditationDate" class="form-label">Дата аккредитации</label>
                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                            </div>
                            <div class="mb-3 col" >
                                <label for="categoryYears" class="form-label">Поточний стаж</label>
                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 col">
                                <label for="accreditationDate" class="form-label">Дата аккредитации</label>
                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                            </div>
                            <div class="mb-3 col" >
                                <label for="categoryYears" class="form-label">Поточний стаж</label>
                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="mb-3 col">
                                <label for="accreditationDate" class="form-label">Дата аккредитации</label>
                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                            </div>
                            <div class="mb-3 col" >
                                <label for="categoryYears" class="form-label">Поточний стаж</label>
                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 col">
                                <label for="accreditationDate" class="form-label">Дата аккредитации</label>
                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                            </div>
                            <div class="mb-3 col" >
                                <label for="categoryYears" class="form-label">Поточний стаж</label>
                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
                            </div>
                        </div>


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
                                    <option value="Наказ">Наказ</option>
                                    <option value="Розпорядження">Розпорядження</option>
                                    <option value="Постанова">Постанова</option>
                                    <option value="Рішення">Рішення</option>
                                    <option value="Свідоцтво">Свідоцтво </option>
                                    <option value="Свідоцтво">Контракт про працевлаштування</option>
                                </select>
                            </div>
                        </div>
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
