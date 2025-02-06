<!-- Delete Employer Modal -->
<?php

    $tempEmp3 = new Employer($connection);
    // $tempEmp3->loadByID();


?>


<div class="modal fade" id="deleteEmployerModal" tabindex="-1" aria-labelledby="deleteEmployerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEmployerModalLabel" style="color: #ffffff;">Звільнення працівника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ви увірені у тому, що бажаєте звільнити співробітника?</p>
                <p><strong>Employer ID:</strong> <span id="deleteEmployerId"></span></p>
                <p><strong>ФІБ: </strong><span></span></p>
                <p><strong>Рівень доступу :</strong><span></span></p>
                <!-- <p><strong>Посада :</strong><span></span></p> -->
                <p><strong>Прийнято з: </strong><span></span></p>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Підтвердить пароль адміністратору:</label>
                    <input type="password" id="adminPassword" class="form-control" placeholder="Введить пароль" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відміна</button>
                <button type="button" class="btn bg-danger" id="confirmDeleteEmployer" style="color: #ffffff;" >Звільнити</button>
            </div>
        </div>
    </div>
</div>







