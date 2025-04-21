
<div class="modal fade" id="deletePositionModal" tabindex="-1" aria-labelledby="deletePositionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEmployerModalLabel" style="color: #ffffff;">Звільнення працівника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteEmployerPositionForm" enctype="multipart/form-data">
            <div class="modal-body">
                <p>Ви увірені у тому, що бажаєте видалити посаду?</p>
                <p><strong>ПІБ:  </strong> <span id="EmployerNamee_positionDeleteForm"></span></p>
                <p><strong>ID користувача </strong><span id="EmployerID_positionDeleteForm" name="EmployerID_positionDeleteForm"></span></p>
                <p><strong>Назва посади: </strong><span id="PositionName_positionDeleteForm" ></span></p>
                <p><strong>ID посади:  </strong> <span id="PositionID_positionDeleteForm" name="PositionID_positionDeleteForm"></span></p>
                
                
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label">Підтвердить пароль адміністратору:</label>
                        <input type="password" id="adminPassword_positionDeleteForm" name="adminPassword_positionDeleteForm" class="form-control" placeholder="Введить пароль" required>
                    </div>

                    <div class="file-attach">
                            <div class="mb-3 col-md-12" >
                                <label for="uploadPDF" class="form-label">Додати файл із прохожденням курсів/стажировки</label>
                                <input type="file" class="form-control" id="uploadPDF_positionDeleteForm" name="confirmationFile_positionDeleteForm" accept=".pdf" required >
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="employeeSelect" class="form-label">Назва документу</label>
                                    <input type="text" class="form-control" id="docName_positionDeleteForm" name="docName_positionDeleteForm" placeholder="Постанова про створення позиції..." required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Ради</label>
                                    <select class="form-control" id="sphere_positionDeleteForm" name="sphere_positionDeleteForm" required placeholder="Адмінастративна...">
                                        <option value="Адмінастративна">Адмінастративна</option>
                                        <option value="Навчальна">Навчальна</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currentSalary" class="form-label">Призначення</label>
                                    <input type="text" class="form-control" id="purpose_positionDeleteForm" name="purpose_positionDeleteForm" placeholder="Наказ про створення нової посади..." required >
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Тип документа</label>
                                    <select class="form-control" id="docType_positionDeleteForm" name="docType_positionDeleteForm" required>
                                        <option value="Прохождення курсів">Прохождення курсів</option>
                                        <option value="Прохождення стажировки">Прохождення стажировки</option>
                                    </select>
                                </div>
                            </div>
                        </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="openAnotherModal()">Відміна</button>
                <button type="submit" class="btn bg-danger" id="deleteEmployerPositionForm" style="color: #ffffff;" >Звільнити із посади</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAnotherModal() {
        $('#deletePositionModal').modal('hide'); 
        $('#positionManagModal').modal('show');
    }
</script>