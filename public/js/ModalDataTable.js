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
    tableBody.innerHTML = ''; // Очистка перед вставкой новых строк

    positions.forEach((position, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <th scope="row">${index + 1}</th>
            <td>${position.positionName}</td>
            <td>${position.positionLevel}</td>
            <td>${position.salary}</td>
            <td>${position.positionRequirements}</td>
            <td class="d-flex">
            </td>
        `;
        tableBody.appendChild(row);
    });
}
