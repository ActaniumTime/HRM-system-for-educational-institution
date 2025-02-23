
    <div class="modal fade" id="EditDocumentModal" tabindex="-1" aria-labelledby="EditDocumentModal" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">Редагування даних про документ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="EditDocumentForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Номер документу</label>
                                <input type="text" class="form-control" id="editDocID" name="editDocID" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Нова назва документу</label>
                                <input type="text" class="form-control" id="editDocName" name="editDocName" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currentSalary" class="form-label">Нова категорія</label>
                                <input type="text" class="form-control" id="editSphere" name="editSphere" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="positionRequirements" class="form-label">Новий тип документу</label>
                                <input type="text" class="form-control" id="editDocType" name="editDocType" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currentSalary" class="form-label">Новий опис</label>
                                <input type="text" class="form-control" id="editPurpose" name="editPurpose" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn-cor"  data-bs-dismiss="modal">Назад</button>
                    <button type="submit" class="btn btn-primary" form="EditDocumentForm">Зберегти</button>
                </div>
            </div>
        </div>
    </div>


