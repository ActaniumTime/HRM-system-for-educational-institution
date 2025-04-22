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


    document.getElementById('employeeTable').addEventListener('click', event => {
        const button8 = event.target.closest('.positionManag');
        if (button8) {
            const employerID  = button8.getAttribute('data-employer-id');
            fetchPositionsByEmployer(employerID);
        }
    });


    document.addEventListener('click', (event) => {
        if (event.target && event.target.classList.contains('positionManag')) {

            const employerID = event.target.getAttribute('data-employer-id');
            const name = event.target.getAttribute('data-name');
            const surname = event.target.getAttribute('data-surname');
            const fathername = event.target.getAttribute('data-fathername');

            document.getElementById('employerID__positionAddForm').value = employerID;
            document.getElementById('name_positionAddForm').value = name;
            document.getElementById('surname_positionAddForm').value = surname;
            document.getElementById('fathername_positionAddForm').value = fathername;
        }
    });





    document.getElementById('employeeTable').addEventListener('click', event => {
        const button8 = event.target.closest('.positionManag');
        if (button8) {
            const employerID  = button8.getAttribute('data-employer-id');
            fetchPositionsByEmployer(employerID);
        }
    });

        document.getElementById('employeeTable').addEventListener('click', event => {
        const button8 = event.target.closest('.positionManag');
        if (button8) {
            const employerID  = button8.getAttribute('data-employer-id');
            fetchPositionsByEmployer(employerID);
        }
    });



    document.addEventListener('click', (event) => {
        if (event.target && event.target.classList.contains('deletePositionBtn')) {

            const positionID = event.target.getAttribute('data-positionID');
            const employerID = event.target.getAttribute('data-employerID');
            const positionName = event.target.getAttribute('data-positionName');

            document.getElementById('EmployerID_positionDeleteForm').value  = employerID;
            document.getElementById('PositionID_positionDeleteForm').value  = positionID;
            document.getElementById('PositionName_positionDeleteForm').value = positionName;
        }
    });

});



function fetchPositionsByEmployer(employerID) {
    fetch(`../../../app/models/GetData/getPersonalPositionTable.php?employerID=${employerID}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Positions:', data);
            updatePositionsTable(data); // можешь написать функцию для отрисовки данных в таблице
        })
        .catch(error => {
            console.error('Ошибка парсинга JSON:', error);
            console.error('Ответ от сервера:', data); // ← покажет ошибку сервера
        });
}

function updatePositionsTable(positions) {
    const tableBody = document.getElementById('positionsTable');
    tableBody.innerHTML = ''; 

    positions.forEach((position, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <th scope="row" style="border-radius: 36px 0px 0px 36px;">${index + 1}</th>
            <td>${position.positionName}</td>
            <td>${position.positionLevel}</td>
            <td>${position.salary}</td>
            <td>${position.positionRequirements}</td>
            <td style="border-radius: 0px 36px 36px 0px;">
            <div class="d-flex">
                <button type="button" class="Delete-button deletePositionBtn"  
                    data-positionID = "${position.positionID}"
                    data-employerID = "${position.empID}"
                    data-positionName = "${position.positionName}"
                    data-bs-toggle="modal"
                    data-bs-target="#deletePositionModal"
                    title="Видалити позицію">

                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="icon_white no-click">
                    <path d="m23,12h-6c-.553,0-1-.447-1-1s.447-1,1-1h6c.553,0,1,.447,1,1s-.447,1-1,1Zm-1,4c0-.553-.447-1-1-1h-4c-.553,0-1,.447-1,1s.447,1,1,1h4c.553,0,1-.447,1-1Zm-2,5c0-.553-.447-1-1-1h-2c-.553,0-1,.447-1,1s.447,1,1,1h2c.553,0,1-.447,1-1Zm-4.344,2.668c-.558.213-1.162.332-1.795.332h-5.728c-2.589,0-4.729-1.943-4.977-4.521L1.86,6h-.86c-.552,0-1-.447-1-1s.448-1,1-1h4.101C5.566,1.721,7.586,0,10,0h2c2.414,0,4.434,1.721,4.899,4h4.101c.553,0,1,.447,1,1s-.447,1-1,1h-.886l-.19,2h-2.925c-1.654,0-3,1.346-3,3,0,1.044.537,1.962,1.348,2.5-.811.538-1.348,1.456-1.348,2.5s.537,1.962,1.348,2.5c-.811.538-1.348,1.456-1.348,2.5,0,1.169.678,2.173,1.656,2.668Zm-.84-19.668c-.414-1.161-1.514-2-2.816-2h-2c-1.302,0-2.402.839-2.816,2h7.631Z"/>
                    </svg>
                </button>
            <div>
            </td>
            </td>
        `;
        tableBody.appendChild(row);
    });
}


document.getElementById('deleteEmployerPositionForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    console.log('Отправляемые данные:');
    for (let [key, value] of formData.entries()) {
        console.log(`${key}:`, value);
    }

    fetch('../../../app/models/modals/DeleteEmpPosition.php', {
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
