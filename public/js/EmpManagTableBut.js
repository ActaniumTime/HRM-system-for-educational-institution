document.addEventListener('DOMContentLoaded', () => {
    const updatedForm = document.getElementById('employerForm');
    const updateEmpDoc = document.getElementById('updateEmpDoc');

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
            closeAllModals();
            showSuccessModal();
            updateTable();
        })
        .catch(error => {
            showErrorModal(error);
        });
    });

    let jsonData2 = {};

    updateEmpDoc.addEventListener('submit', (e) => {
        e.preventDefault();
    
        const formData = new FormData(updateEmpDoc);

        const employerIDField = document.getElementById('employerID');
        if (employerIDField) {
            formData.append('employerID', employerIDField.value);
        }
    
        fetch('../../../app/models/modals/UpdatedEmpContract.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            closeAllModals();
            showSuccessModal();
            updateTable();
        })
        .catch(error => {
            console.error('Error:', error);
        });
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

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Ответ от сервера:', data);
                const tbody = document.querySelector('#employeeTable');
                tbody.innerHTML = '';

                data.forEach((employer, index) => {
                    const accessLevelText = getAccessLevelText(employer.accessLevelID);
                    var tempAccessLevelID;
                    switch (accessLevelText) {
                        case "Admin":
                            tempAccessLevelID = "Директор";
                            break;
                        case "Manager":
                            tempAccessLevelID = "HR-менеджер";
                            break;
                        case "Employee":
                            tempAccessLevelID = "Співробітник";
                            break;
                        default:
                            tempAccessLevelID = "Хто ти воїн?...";
                    }
                    const row = document.createElement('tr');
                    row.classList.add('table-row'); 
                    console.log("JS work 4");
                    let deleteButtonHTML = '';
                    if (employer.accessLevelID !== "1" || employer.accessLevelID !== "2") {
                        deleteButtonHTML = `
                                    <button type="button" class="Delete-button"
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
                                data-bs-toggle="modal"
                                data-bs-target="#deleteEmployerModal"
                                title="Видалити співробітника">

                                <svg xmlns=http://www.w3.org/2000/svg id=Layer_1 data-name=Layer 1 viewBox=0 0 24 24 class=icon_white no-click>
                                <path d=m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z/>
                                </svg>
                                </button>
                        `;
                    }
                    else{
                        deleteButtonHTML = `
                            <button type="button" class="Delete-button"
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
                            title="Видалити співробітника">

                            <svg xmlns=http://www.w3.org/2000/svg id=Layer_1 data-name=Layer 1 viewBox=0 0 24 24 class=icon_white no-click>
                            <path d=m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z/>
                            </svg>
                            </button>
                        `;
                    }

                    let tempEmpStatus = '';
                    if(employer.currentStatus === "Inactive"){
                        tempEmpStatus = 'inactive-row';
                        row.classList.add(tempEmpStatus); 
                        row.setAttribute('data-status', employer.currentStatus);
                    }


                    row.innerHTML = `
                        <th scope="row" style="border-radius: 36px 0px 0px 36px;">${index + 1}</th>
                        <td><img src="../../../Files/photos/${employer.avatar}" alt="User Photo" class="rounded-circle" width="50" height="50" id="employerAvatar"></td>
                        <td>${tempAccessLevelID}</td>
                        <td>${employer.surname}</td>
                        <td>${employer.name}</td>
                        <td>${employer.fathername}</td>
                        <td>${employer.birthday}</td>
                        <td>${employer.gender === "Male" ? "Чоловіча" : "Жінка"}</td>
                        <td>${employer.email}</td>
                        <td>${employer.phoneNumber}</td>
                        <td>${employer.department}</td>
                        <td>${employer.dateAccepted}</td>
                        <td>${employer.dateFired === null ? "" : employer.dateFired}</td>
                        <td>${employer.employmentType === "Full-time" ? "Повна зайнятість" : "Часткова зайнятість"}</td>
                        
                        <td style="border-radius:  0px 36px 36px 0px;">
                        <div class="d-flex">
                                <button type="button" class="editEmployerBtn" 
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

                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="icon_white no-click">
                                    <path d="M22.987,5.452c-.028-.177-.312-1.767-1.464-2.928-1.157-1.132-2.753-1.412-2.931-1.44-.237-.039-.479,.011-.682,.137-.071,.044-1.114,.697-3.173,2.438,1.059,.374,2.428,1.023,3.538,2.109,1.114,1.09,1.78,2.431,2.162,3.471,1.72-2.01,2.367-3.028,2.41-3.098,.128-.205,.178-.45,.14-.689Z"/>
                                    <path d="M12.95,5.223c-1.073,.968-2.322,2.144-3.752,3.564C3.135,14.807,1.545,17.214,1.48,17.313c-.091,.14-.146,.301-.159,.467l-.319,4.071c-.022,.292,.083,.578,.29,.785,.188,.188,.443,.293,.708,.293,.025,0,.051,0,.077-.003l4.101-.316c.165-.013,.324-.066,.463-.155,.1-.064,2.523-1.643,8.585-7.662,1.462-1.452,2.668-2.716,3.655-3.797-.151-.649-.678-2.501-2.005-3.798-1.346-1.317-3.283-1.833-3.927-1.975Z"/>
                                    </svg>
                                </button>

                                ${deleteButtonHTML}

                                <button type="button" class="Info-button"
                                    data-employer-id="${employer.employerID}"
                                    data-bs-toggle="modal"
                                    title="До сторінки співробітника ">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="icon_white no-click">
                                    <path d="M12.836.028A12,12,0,0,0,.029,12.855C.47,19.208,6.082,24,13.083,24H19a5.006,5.006,0,0,0,5-5V12.34A12.209,12.209,0,0,0,12.836.028ZM12,5a1.5,1.5,0,0,1,0,3A1.5,1.5,0,0,1,12,5Zm2,13a1,1,0,0,1-2,0V12H11a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2Z"/>
                                    </svg>
                                </button>

                                <button type="button" class="positionManag" 
                                    id="positionManagBtn"
                                    data-bs-toggle=\"modal\"
                                    data-bs-target=\"#positionManagModal\"
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
                                        title="Керування позиціями та ЗП ">

                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="icon_white no-click">
                                    <path d="m9.54,1.717c.486-.453.96-1.063.96-1.717h-4c0,.654.474,1.264.96,1.717-1.653.64-3.46,2.584-3.46,4.363,0,1.61,1.233,2.919,2.75,2.919h3.5c1.517,0,2.75-1.31,2.75-2.919,0-1.78-1.807-3.724-3.46-4.363Zm13.609,6.963c-.515-.469-1.186-.712-1.878-.678-.697.032-1.339.334-1.794.835l-3.541,3.737c.032.21.065.42.065.638,0,2.083-1.555,3.876-3.617,4.17l-4.241.606-.283-1.979,4.241-.606c1.084-.155,1.9-1.097,1.9-2.191,0-1.22-.993-2.213-2.213-2.213H3c-1.654,0-3,1.346-3,3v7c0,1.654,1.346,3,3,3h9.664l10.674-11.655c.948-1.062.862-2.707-.189-3.665Zm-7.898-3.931l-1.414-1.414,2.75-2.75c.779-.78,2.049-.78,2.828,0l2.752,2.752-1.414,1.414-1.752-1.752v3.661c-.361.219-.69.488-.976.801l-1.024,1.081V3l-1.75,1.75"/>
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
    
    
    document.getElementById('employeeTable').addEventListener('click', event => {
        const button3 = event.target.closest('.Info-button');
        if (button3) {
            const docID = button3.getAttribute('data-employer-id');
            window.open(`../../../app/models/GetData/getEmployerPage.php?emp_ID=${docID}`);
        }
    });
    
    
});

document.addEventListener("DOMContentLoaded", function () {
    let tooltipTimeouts = new Map();

    document.addEventListener("mouseover", event => {
        let target = event.target.closest("button, a[data-bs-toggle='tooltip']");
        if (target && !tooltipTimeouts.has(target)) {
            let title = target.getAttribute("title") || target.getAttribute("data-bs-original-title");
            if (title) {
                target.setAttribute("data-bs-original-title", title);
                target.removeAttribute("title");
            }

            let timeout = setTimeout(() => {
                if (document.body.contains(target)) {
                    if (target.tooltipInstance) {
                        target.tooltipInstance.dispose();
                    }
                    target.tooltipInstance = new bootstrap.Tooltip(target, {
                        title: title,
                        customClass: "custom-tooltip",
                        container: "body"
                    });
                    target.tooltipInstance.show();
                }
            }, 1000);

            tooltipTimeouts.set(target, timeout);
        }
    });

    document.addEventListener("mouseout", event => {
        let target = event.target.closest("button, a[data-bs-toggle='tooltip']");
        if (target) {
            clearTimeout(tooltipTimeouts.get(target));
            tooltipTimeouts.delete(target);
            if (target.tooltipInstance) {
                target.tooltipInstance.dispose();
                target.tooltipInstance = null;
            }
        }
    });
});

