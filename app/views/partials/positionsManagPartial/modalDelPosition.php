
<div class="modal fade" id="deletePositionModal" tabindex="-1" aria-labelledby="deletePositionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEmployerModalLabel" style="color: #ffffff;">Звільнення працівника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви увірені у тому, що бажаєте видалити посаду?</p>
                <p><strong>Номер посади:  </strong> <span id="deletePositionID"></span></p>
                <p><strong>Назва посади: </strong><span id="deletePositionName"></span></p>
                <p><strong>Рівень посади: </strong><span id="deletePositionLevel"></span></p>
                <p><strong>Оклад посади: </strong><span id="deleteSalary"></span></p>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Підтвердить пароль адміністратору:</label>
                    <input type="password" id="adminPassword" class="form-control" placeholder="Введить пароль" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="button" class="btn bg-danger" id="confirmDeletPosition" style="color: #ffffff;" >Звільнити</button>
            </div>
        </div>
    </div>
</div>