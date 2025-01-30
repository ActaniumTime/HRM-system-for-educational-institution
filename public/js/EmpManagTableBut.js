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

    downloadJsonButton.addEventListener('click', () => {
        if (Object.keys(jsonData).length === 0) {
            alert('Please submit the form first to generate JSON.');
            return;
        }

        const jsonBlob = new Blob([JSON.stringify(jsonData, null, 2)], { type: 'application/json' });

        const downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(jsonBlob);
        downloadLink.download = 'employer_data.json';

        downloadLink.click();

        URL.revokeObjectURL(downloadLink.href);
    });

    function getAccessLevelText(accessLevelID) {
        const levels = {
            1: "Admin",
            2: "Manager",
            3: "Employee"
        };
        return levels[accessLevelID] || "Unknown";
    }

    function updateTable() {
        const url = '../../models/get_table.php';
    
        // Отправляем GET-запрос
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Ответ от сервера:', data);
                const tbody = document.querySelector('tbody'); // Находим tbody, где выводятся данные
                tbody.innerHTML = ''; // Очищаем текущий контент таблицы
    
                // Заполняем таблицу новыми данными
                data.forEach((employer, index) => {
                    const accessLevelText = getAccessLevelText(employer.accessLevelID);
                    const row = document.createElement('tr');
                    console.log("JS work 4");
                    row.innerHTML = `
                        <th scope="row" style="border-radius: 36px 0px 0px 36px;">${index + 1}</th>
                        <td><img src="../../../Files/photos/${employer.avatar}" alt="User Photo" class="rounded-circle" width="50" height="50" id="employerAvatar"></td>
                        <td>${accessLevelText}</td>
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
                        <td>${employer.dateFired}</td>
                        <td>${employer.admissionBasis}</td>
                        <td>${employer.employmentType}</td>
                        <td class=\"d-flex\">
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

                            <button type=\"button\" class=\"Delete-button\"
                                data-employer-id="${employer.employerID}"
                                data-bs-toggle=\"modal\"
                                data-bs-target=\"#deleteEmployerModal\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                <path d=\"m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z\"/>
                                </svg>
                            </button>

                            <button type=\"button\" class=\"Info-button\"
                                data-employer-id="${employer.employerID}"
                                data-bs-toggle=\"modal\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                <path d=\"M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z\"/>
                                </svg>

                            </button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Ошибка при запросе:', error);
            });
            // saveRowsOrder();
    }
    
    
    
    
    
});
