document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', (event) => {
        if (event.target && event.target.classList.contains('editEmployerBtn')) {


            const employerAvatar = event.target.getAttribute('data-employer-avatar');
            const employerID = event.target.getAttribute('data-employer-id');
            const accessLevelID = event.target.getAttribute('data-access-level-id');
            const name = event.target.getAttribute('data-name');
            const surname = event.target.getAttribute('data-surname');
            const fathername = event.target.getAttribute('data-fathername');
            const birthday = event.target.getAttribute('data-birthday');
            const gender = event.target.getAttribute('data-gender');
            const passportID = event.target.getAttribute('data-passport-id');
            const homeAddress = event.target.getAttribute('data-home-address');
            const email = event.target.getAttribute('data-email');
            const phoneNumber = event.target.getAttribute('data-phone-number');
            const department = event.target.getAttribute('data-department');
            const dateAccepted = event.target.getAttribute('data-date-accepted');
            const currentStatus = event.target.getAttribute('data-current-status');
            const dateFired = event.target.getAttribute('data-date-fired');
            const admissionBasis = event.target.getAttribute('data-admission-basis');
            const employmentType = event.target.getAttribute('data-employment-type');

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
        }
    }); 
});


document.addEventListener('DOMContentLoaded', () => {
    const updatedForm = document.getElementById('employerForm');
    const downloadJsonButton = document.getElementById('downloadJson');

    let jsonData = {};

    updatedForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(updatedForm);
        jsonData = {};

        formData.forEach((value, key) => {
            if (key === "dateFired" && value === "") {
                jsonData[key] = null;
            } else {
                jsonData[key] = value;
            }
        });

        console.log('Отправка запроса:', jsonData);


        fetch('../../../app/models/DashboardModel.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => {
            console.log(response);
            response.json()
        })
        .then(result => {
            console.log(result);
            updateTable(); // Обновляем таблицу после успешного обновления данных
            console.log("JS work 6");
        })
        .catch(error => {
            console.error('Error:', error);
        });

        alert('Data updated. Table will refresh.');
    });

});

function getAccessLevelText(accessLevelID) {
    const levels = {
        1: "Директор",
        2: "HR-менеджер",
        3: "Співробітник",
    };
    return levels[accessLevelID] || "Unknown";
}

function updateTable() {
    const url = '../../models/get_table.php';

    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Ответ от сервера:', data);
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = ''; 

            data.forEach((employer, index) => {
                const accessLevelText = getAccessLevelText(employer.accessLevelID);
                const row = document.createElement('tr');
                console.log("JS work 4");
                row.innerHTML = `
                    <th scope="row" style="border-radius: 36px 0px 0px 36px;">${index + 1}</th>
                    <td><img src="../../../Files/photos/${employer.avatar}" alt="User Photo" class="rounded-circle" width="50" height="50" id="employerAvatar"></td>
                    <td>${accessLevelText}</td>
                    <td>${employer.surname}</td>
                    <td>${employer.name}</td>
                    <td>${employer.fathername}</td>
                    <td>${employer.birthday}</td>
                    <td>${employer.gender}</td>
                    <td>${employer.email}</td>
                    <td>${employer.phoneNumber}</td>
                    <td>${employer.department}</td>
                    
                    <td style=\"border-radius:  0px 36px 36px 0px ;\">
                        <div class=\"d-flex\">
                            <button type="button" class="btn btn-primary editEmployerBtn" 
                                data-employer-avatar="../../../Files/photos/${employer.avatar}"
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

                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                <path d=\"M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z\"/>
                                <path d=\"M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z\"/>
                                </svg>
                            </button>


                    </div>


                    </td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Ошибка при запросе:', error);
        });
}


