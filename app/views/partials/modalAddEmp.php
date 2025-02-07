<div class="modal fade" id="AddEmployerModal" tabindex="-1" aria-labelledby="employerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employerModalLabel">Employer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employerForm_AddForm" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img id="employerAvatarPreview" src="" alt="User Photo" class="rounded-circle" width="150" height="150" style="    border: 5px solid #ffc825; margin-bottom: 15px;">
                                <input type="file" id="employerAvatar" name="avatar" accept="image/*" class="form-control mt-3">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="accessLevelID" class="form-label">Access Level</label>
                            <select class="form-select" id="accessLevelID_AddForm" name="accessLevelID">
                                <option value="Administrator">Администратор</option>
                                <option value="Manager">Менеджер</option>
                                <option value="Employee">Сотрудник</option>
                                <option value="Teacher">Преподаватель</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password_AddForm" name="password">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name_AddForm" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname_AddForm" name="surname">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="fathername" class="form-label">Fathername</label>
                            <input type="text" class="form-control" id="fathername_AddForm" name="fathername">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday_AddForm" name="birthday">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender_AddForm" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="passportID" class="form-label">Passport ID</label>
                            <input type="text" class="form-control" id="passportID_AddForm" name="passportID">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="homeAddress" class="form-label">Home Address</label>
                            <input type="text" class="form-control" id="homeAddress_AddForm" name="homeAddress">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_AddForm" name="email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber_AddForm" name="phoneNumber">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department_AddForm" name="department">
                                <option value="Software Engineering">Программная инженерия</option>
                                <option value="Computer Science">Компьютерные науки</option>
                                <option value="Designers">Дизайнеры</option>
                                <option value="Administration">Администрация</option>
                                <option value="Accounting">Бухгалтерия</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateAccepted" class="form-label">Date Accepted</label>
                            <input type="date" class="form-control" id="dateAccepted_AddForm" name="dateAccepted">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="currentStatus" class="form-label">Current Status</label>
                            <input type="text" class="form-control" id="currentStatus_AddForm" name="currentStatus">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dateFired" class="form-label">Date Fired</label>
                            <input type="date" class="form-control" id="dateFired_AddForm" name="dateFired">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="admissionBasis" class="form-label">Admission Basis</label>
                            <input type="text" class="form-control" id="admissionBasis_AddForm" name="admissionBasis">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="employmentType" class="form-label">Employment Type</label>
                            <select class="form-select" id="employmentType_AddForm" name="employmentType">
                                <option value="Full-time">Полный день</option>
                                <option value="Part-time">Частичный</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="employerForm_AddForm">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('employerAvatar').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('employerAvatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('employerForm_AddForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    formData.forEach((value, key) => {
        if (key === "dateFired_AddForm" && value === "") {
            jsonData[key] = null;
        } else {
            jsonData[key] = value;
        }
    });

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/AddEmp.php', {
        method: 'POST',
        body: formData, 
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                alert('Сотрудник добавлен успешно!');
                location.reload();
            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});
</script>
