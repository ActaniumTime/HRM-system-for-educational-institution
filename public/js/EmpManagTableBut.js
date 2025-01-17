document.addEventListener('DOMContentLoaded', () => {
    const updatedForm = document.getElementById('employerForm');
    const downloadJsonButton = document.getElementById('downloadJson');
    const tableBody = document.querySelector('table tbody');

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

        fetch('../../../app/models/DashboardModel.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(result => {
            console.log(result);
            updateTable(); // Обновляем таблицу после успешного обновления данных
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
        fetch('../../../app/models/DashboardModel.php?action=getAllEmployers') // Добавим специальный action для получения данных
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = ''; // Очистка таблицы
                data.forEach((employer, index) => {
                    tableBody.innerHTML += `
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td><img src="../../../Files/photos/${employer.photoPath}" alt="User Photo" class="rounded-circle" width="50" height="50"></td>
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
                            <td>
                                <button type="button" class="btn btn-primary editEmployerBtn"
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
                        </tr>`;
                });
            })
            .catch(error => {
                console.error('Error loading table data:', error);
            });
    }
});
