document.addEventListener('DOMContentLoaded', () => {

        

    const editButtons = document.querySelectorAll('.editEmployerBtn');
    
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const employerAvatar = button.getAttribute('data-employer-avatar');
            const employerID = button.getAttribute('data-employer-id');
            const accessLevelID = button.getAttribute('data-access-level-id');
            const name = button.getAttribute('data-name');
            const surname = button.getAttribute('data-surname');
            const fathername = button.getAttribute('data-fathername');
            const birthday = button.getAttribute('data-birthday');
            const gender = button.getAttribute('data-gender');
            const passportID = button.getAttribute('data-passport-id');
            const homeAddress = button.getAttribute('data-home-address');
            const email = button.getAttribute('data-email');
            const phoneNumber = button.getAttribute('data-phone-number');
            const department = button.getAttribute('data-department');
            const dateAccepted = button.getAttribute('data-date-accepted');
            const currentStatus = button.getAttribute('data-current-status');
            const dateFired = button.getAttribute('data-date-fired');
            const admissionBasis = button.getAttribute('data-admission-basis');
            const employmentType = button.getAttribute('data-employment-type');
            
            const photoElement = document.getElementById('employerAvatar');
            photoElement.src = employerAvatar;

            document.getElementById('employerAvatar').value = employerAvatar;
            document.getElementById('employerID').value = employerID;
            document.getElementById('accessLevelID').value = accessLevelID;
            document.getElementById('name').value = name;
            document.getElementById('surname').value = surname;
            document.getElementById('fathername').value = fathername;
            document.getElementById('birthday').value = birthday;
            document.getElementById('gender').value = gender;
            document.getElementById('passportID').value = passportID;
            document.getElementById('homeAddress').value = homeAddress;
            document.getElementById('email').value = email;
            document.getElementById('phoneNumber').value = phoneNumber;
            document.getElementById('department').value = department;
            document.getElementById('dateAccepted').value = dateAccepted;
            document.getElementById('currentStatus').value = currentStatus;
            document.getElementById('dateFired').value = dateFired;
            document.getElementById('admissionBasis').value = admissionBasis;
            document.getElementById('employmentType').value = employmentType;
        });
    });
    
    document.addEventListener('DOMContentLoaded', () => {
        const tableBody = document.querySelector('#employersTable tbody');
    
        const loadTableData = () => {
            fetch('../../../app/models/getEmployers.php')
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = ''; // Очистить таблицу перед добавлением данных
    
                    data.forEach((employer, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <th scope="row">${index + 1}</th>
                            <td><img src="${employer.avatar}" alt="User Photo" class="rounded-circle" width="50" height="50"></td>
                            <td>${employer.employerID}</td>
                            <td>${employer.accessLevelID}</td>
                            <td>${employer.name}</td>
                            <td>${employer.surname}</td>
                            <td>${employer.fathername}</td>
                            <td>${employer.birthday}</td>
                            <td>${employer.gender}</td>
                            <td>${employer.passportID}</td>
                            <td>${employer.homeAddress}</td>
                            <td>${employer.email}</td>
                            <td>${employer.phoneNumber}</td>
                            <td>${employer.department}</td>
                            <td>${employer.dateAccepted}</td>
                            <td>${employer.currentStatus}</td>
                            <td>${employer.dateFired || '-'}</td>
                            <td>${employer.admissionBasis}</td>
                            <td>${employer.employmentType}</td>
                            <td>
                                <button type="button" class="btn btn-primary editEmployerBtn" 
                                        data-employer-avatar="${employer.avatar}"
                                        data-employer-id="${employer.employerID}"
                                        data-access-level-id="${employer.accessLevelID}"
                                        data-name="${employer.name}"
                                        data-surname="${employer.surname}"
                                        data-fathername="${employer.fathername}"
                                        data-birthday="${employer.birthday}"
                                        data-gender="${employer.gender}"
                                        data-passport-id="${employer.passportID}"
                                        data-home-address="${employer.homeAddress}"
                                        data-email="${employer.email}"
                                        data-phone-number="${employer.phoneNumber}"
                                        data-department="${employer.department}"
                                        data-date-accepted="${employer.dateAccepted}"
                                        data-current-status="${employer.currentStatus}"
                                        data-date-fired="${employer.dateFired}"
                                        data-admission-basis="${employer.admissionBasis}"
                                        data-employment-type="${employer.employmentType}"
                                        data-bs-toggle="modal" data-bs-target="#employerModal">
                                    Edit Employer
                                </button>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
    
                    // Реинициализация кнопок редактирования
                    initEditButtons();
                });
        };
    
        const initEditButtons = () => {
            const editButtons = document.querySelectorAll('.editEmployerBtn');
            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Заполнить модальное окно, как в вашем коде
                });
            });
        };
    
        // Загрузить данные при загрузке страницы
        loadTableData();
    
        // Добавьте вызов loadTableData() после отправки формы, чтобы обновить данные
        document.getElementById('employerForm').addEventListener('submit', () => {
            loadTableData();
        });
    });
    

});