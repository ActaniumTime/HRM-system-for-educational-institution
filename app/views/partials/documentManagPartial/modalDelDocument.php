
<div class="modal fade" id="deleteDocumentModal" tabindex="-1" aria-labelledby="deleteDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEmployerModalLabel" style="color: #ffffff;">Видалення документу</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви увірені у тому, що бажаєте видалити документ?</p>
                <p><strong>Номер документу:  </strong> <span id="deleteDocumentID"></span></p>
                <p><strong>Назва джокумента: </strong><span id="deleteDocumentName"></span></p>
                <p><strong>Властник документу: </strong><span id="deleteDocumentOwner"></span></p>
                <p><strong>Категорія документу</strong><span id="deleteDocumentCat"></span></p>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Підтвердить пароль адміністратору:</label>
                    <input type="password" id="adminPassword" class="form-control" placeholder="Введить пароль" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="button" class="btn bg-danger" id="confirmDeletPosition" style="color: #ffffff;" >Видалити документ</button>
            </div>
        </div>
    </div>
</div>