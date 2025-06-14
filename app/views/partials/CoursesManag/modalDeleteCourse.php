
<div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteCourseModalLabel" style="color: #ffffff;">Видалення курсів/стажування</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви увірені у тому, що бажаєте видалити курси/стажування?</p>
                <p><strong>ID:</strong> <span id="courseID_deleteForm" name="courseID_deleteForm"></span></p>
                <p><strong>Проходив курси/стажування: </strong> <span id="employerName_deleteForm" name="employerName_deleteForm"></span></p>
                <p><strong>Назва курсів/стажування: </strong><span id="courseName_deleteForm" name="courseName_deleteForm"></span></p>
                <p><strong>Назва організатора: </strong><span id="organizationName_deleteForm" name="organizationName_deleteForm"></span></p>
                <p><strong>Поточний статус: </strong><span id="currentStatus_deleteForm" name="currentStatus_deleteForm"></span></p>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Підтвердить пароль адміністратору:</label>
                    <input type="password" id="adminPassword" class="form-control" placeholder="Введить пароль" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="button" class="btn bg-danger" id="confirmDeleteEmployer" style="color: #ffffff;" >Видалити</button>
            </div>
        </div>
    </div>
</div>