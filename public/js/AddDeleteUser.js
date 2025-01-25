document.addEventListener('DOMContentLoaded', () => {
    // Делегирование событий на таблицу
    document.getElementById('employeeTable').addEventListener('click', event => {
        const button = event.target.closest('.Delete-button');
        if (button) {
            const employerId = button.getAttribute('data-employer-id');
            document.getElementById('deleteEmployerId').textContent = employerId;

            const confirmButton = document.getElementById('confirmDeleteEmployer');
            confirmButton.onclick = () => deleteEmployer(employerId, button.closest('tr'));
        }
    });
});


document.getElementById('employerForm_AddForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    // Сбор данных из формы
    formData.forEach((value, key) => {
        if (key === "dateFired_AddForm" && value === "") {
            jsonData[key] = null;
        } else {
            jsonData[key] = value;
        }
    });

    console.log('Отправляемые данные:', jsonData);

    // Отправка данных на сервер
    fetch('../../../app/models/AddEmp.php', {
        method: 'POST',
        body: formData, // Для поддержки отправки файлов FormData
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                alert('Сотрудник добавлен успешно!');
                // Здесь можно обновить таблицу
            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
});


function deleteEmployer(employerId, tableRow) {
    const adminPassword = document.getElementById('adminPassword').value;

    if (!adminPassword) {
        alert('Please enter your password to confirm.');
        return;
    }

    fetch('../../../app/models/deleteEndpoint.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ employerID: employerId, password: adminPassword })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Employer deleted successfully.');

            // Удаляем строку из таблицы
            if (tableRow) {
                tableRow.remove();
            }
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the employer.');
    });
}
