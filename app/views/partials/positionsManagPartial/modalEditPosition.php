    
    <div class="modal fade" id="EditPositionModal" tabindex="-1" aria-labelledby="salaryModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">Створити позицію</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="positionEditForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Номер посади</label>
                                <input type="text" class="form-control" id="editPositionID" name="editPositionID" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Введить нову посаду</label>
                                <input type="text" class="form-control" id="positionEditName" name="positionName" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Рівень посади</label>
                                <input type="text" class="form-control" id="positionEditLevel" name="positionLevel">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currentSalary" class="form-label">Ставка за посаду</label>
                                <input type="text" class="form-control" id="positionEditSalary" name="positionSalary" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="positionRequirements" class="form-label">Вимоги для отримання посади</label>
                                <input type="text" class="form-control" id="positionEditRequirements" name="positionRequirements" required>
                            </div>
                            <div class="file-attach">
                                <div class="mb-3 col-md-12" >
                                    <label for="uploadPDF" class="form-label">Додати файл із наказом</label>
                                    <input type="file" class="form-control" id="uploadPDF" name="confirmationEditFile" accept=".pdf" required >
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="employeeSelect" class="form-label">Назва документу</label>
                                        <input type="text" class="form-control" id="docEditName" name="docName" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="department" class="form-label">Ради</label>
                                        <select class="form-control" id="sphereEdit" name="sphere" required placeholder="Адмінастративна...">
                                            <option value="Адмінастративна">Адмінастративна</option>
                                            <option value="Навчальна">Навчальна</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="currentSalary" class="form-label">Призначення</label>
                                        <input type="text" class="form-control" id="purposeEdit" name="purpose" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="positionRequirements" class="form-label">Тип документу</label>
                                        <select class="form-control" id="docTypeEdit" name="docType" required>
                                            <option value="Наказ">Наказ</option>
                                            <option value="Розпорядження">Розпорядження</option>
                                            <option value="Постанова">Постанова</option>
                                            <option value="Рішення">Рішення</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn-cor"  data-bs-dismiss="modal">Назад</button>
                    <button type="submit" class="btn btn-primary" form="positionEditForm">Оновити дані</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 
