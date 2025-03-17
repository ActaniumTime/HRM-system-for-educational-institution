<div class="modal fade" id="EditAccreditationModal" tabindex="-1" aria-labelledby="accreditationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accreditationModalLabel">Редактирование аккредитации</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                < id="EditAccreditationForm">
                    <input type="hidden" id="accreditationID" name="accreditationID">

                    

                    <div class="row" style="border-bottom: 1px solid #dee2e6; padding-bottom: 10px; margin-bottom: 10px;">
                        <div class="mb-3 col-md-6">
                            <label for="teacherName" class="form-label">ПІБ співробітника</label>
                            <input type="text" class="form-control" id="teacherName" name="teacherName" disabled>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="currentCategory" class="form-label">Поточна категорія</label>
                            <input type="text" class="form-control" id="currentCategory" name="currentCategory" disabled>
                        </div>
                        
                        <div class="mb-3 col-md-3">
                            <label for="currentCategory" class="form-label">Поточний стаж</label>
                            <input type="text" class="form-control" id="currentCategory" name="currentCategory" disabled>
                        </div>
                    </div>

                    <div class="row">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Спеціаліст
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Точна дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Стаж у катігорії</label>
                                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
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

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Спеціаліст другої категорії
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Точна дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Стаж у катігорії</label>
                                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
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

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Спеціаліст першої категорії
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Точна дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Стаж у катігорії</label>
                                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
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

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Спеціаліст висщої категорії
                                </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Рік проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label for="accreditationDate" class="form-label">Точна дата проходження акредитації</label>
                                                <input type="date" class="form-control" id="accreditationDate" name="accreditationDate">
                                            </div>
                                            <div class="mb-3 col-md-3" >
                                                <label for="categoryYears" class="form-label">Стаж у катігорії</label>
                                                <input type="number" class="form-control" id="categoryYears" name="categoryYears" min="0">
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

                                    </div>
                                </div>
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
