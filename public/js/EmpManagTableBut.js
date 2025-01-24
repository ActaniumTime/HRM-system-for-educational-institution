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
                    const row = document.createElement('tr');
                    console.log("JS work 4");
                    row.innerHTML = `
                        <th scope="row">${index + 1}</th>
                        <td><img src="../../../Files/photos/${employer.avatar}" alt="User Photo" class="rounded-circle" width="50" height="50" id="employerAvatar"></td>
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

                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\" >
                                <path d=\"m19.5,0H4.5C2.019,0,0,2.019,0,4.5v15c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5V4.5c0-2.481-2.019-4.5-4.5-4.5Zm3.5,19.5c0,1.93-1.57,3.5-3.5,3.5H4.5c-1.93,0-3.5-1.57-3.5-3.5V4.5c0-1.93,1.57-3.5,3.5-3.5h15c1.93,0,3.5,1.57,3.5,3.5v15ZM14.732,5.732L6.025,14.439c-.661.66-1.025,1.539-1.025,2.475v1.586c0,.276.224.5.5.5h1.586c.921,0,1.823-.374,2.475-1.025l8.707-8.707c.975-.975.975-2.561,0-3.535-.943-.945-2.592-.945-3.535,0Zm-5.879,11.535c-.465.466-1.11.732-1.768.732h-1.086v-1.086c0-.668.26-1.296.732-1.768l6.604-6.604,2.121,2.121-6.604,6.604Zm8.707-8.707l-1.396,1.396-2.121-2.121,1.396-1.396c.566-.566,1.555-.566,2.121,0,.585.585.585,1.536,0,2.121Z\"/>
                                </svg>
                            </button>

                            <button type=\"button\" class=\"Delete-button\"
                                data-employer-id="${employer.employerID}"
                                data-bs-toggle=\"modal\"
                                data-bs-target=\"#deleteEmployerModal\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                <path d=\"m15.854,10.854l-3.146,3.146,3.146,3.146c.195.195.195.512,0,.707-.098.098-.226.146-.354.146s-.256-.049-.354-.146l-3.146-3.146-3.146,3.146c-.098.098-.226.146-.354.146s-.256-.049-.354-.146c-.195-.195-.195-.512,0-.707l3.146-3.146-3.146-3.146c-.195-.195-.195-.512,0-.707s.512-.195.707,0l3.146,3.146,3.146-3.146c.195-.195.512-.195.707,0s.195.512,0,.707Zm7.146-6.354c0,.276-.224.5-.5.5h-1.5c0,.015,0,.03-.002.046l-1.37,14.867c-.215,2.33-2.142,4.087-4.481,4.087h-6.272c-2.337,0-4.263-1.754-4.48-4.08l-1.392-14.873c-.001-.016-.002-.031-.002-.047h-1.5c-.276,0-.5-.224-.5-.5s.224-.5.5-.5h5.028c.25-2.247,2.16-4,4.472-4h2c2.312,0,4.223,1.753,4.472,4h5.028c.276,0,.5.224.5.5Zm-15.464-.5h8.928c-.243-1.694-1.704-3-3.464-3h-2c-1.76,0-3.221,1.306-3.464,3Zm12.462,1H4.002l1.387,14.826c.168,1.81,1.667,3.174,3.484,3.174h6.272c1.82,0,3.318-1.366,3.485-3.179l1.366-14.821Z\"/>
                                </svg>
                            </button>

                            <button type=\"button\" class=\"Info-button\"
                                data-employer-id="${employer.employerID}"
                                data-bs-toggle=\"modal\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" class=\"icon_white no-click\">
                                <path d=\"M12.5,19c-.28,0-.5-.22-.5-.5v-7c0-.83-.67-1.5-1.5-1.5-.28,0-.5-.22-.5-.5s.22-.5,.5-.5c1.38,0,2.5,1.12,2.5,2.5v7c0,.28-.22,.5-.5,.5Zm-.5-14c-.55,0-1,.45-1,1s.45,1,1,1,1-.45,1-1-.45-1-1-1Zm12,14.5V4.5c0-2.48-2.02-4.5-4.5-4.5H4.5C2.02,0,0,2.02,0,4.5v15c0,2.48,2.02,4.5,4.5,4.5h15c2.48,0,4.5-2.02,4.5-4.5ZM19.5,1c1.93,0,3.5,1.57,3.5,3.5v15c0,1.93-1.57,3.5-3.5,3.5H4.5c-1.93,0-3.5-1.57-3.5-3.5V4.5c0-1.93,1.57-3.5,3.5-3.5h15Z\"/>
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
