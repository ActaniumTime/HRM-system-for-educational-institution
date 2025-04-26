
<div class="modal fade" id="employerModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="employerModalLabel">Налаштування рівня доступу співроботника</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employerForm"> 

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img id="employerAvatar" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                            </div>
                        </div>
                    </div>
  
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="employerID" class="form-label">ID співроботника</label>
                            <input type="text" class="form-control" id="employerID" name="employerID" readonly>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="accessLevelID" class="form-label">Рівень доступу</label>
                            <select class="form-select" id="accessLevelID" name="accessLevelID" placeholder="Оберіть рівень доступу...">
                                <option value="1">Администратор</option>
                                <option value="2">Менеджер</option>
                                <option value="3">Співроботник</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                <button type="submit" class="btn btn-primary" form="employerForm">Зберегти зміни</button>
            </div>
        </div>
    </div>
</div>

