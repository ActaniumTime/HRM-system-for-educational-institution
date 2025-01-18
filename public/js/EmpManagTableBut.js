document.addEventListener('DOMContentLoaded', () => {
    const updatedForm = document.getElementById('employerForm');
    const downloadJsonButton = document.getElementById('downloadJson');
    const tableContainer = document.getElementById('tableContainer'); // Контейнер для таблицы

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
        .then(response => response.text())
        .then(result => {
            console.log(result);

            // Обновляем таблицу
            refreshTable();
        })
        .catch(error => console.error('Error:', error));
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

    // Функция для обновления таблицы
    function refreshTable() {
        fetch('../../../app/views/partials/tableEmp.php') // Путь к вашему файлу с таблицей
            .then(response => response.text())
            .then(html => {
                tableContainer.innerHTML = html; // Обновляем содержимое таблицы
            })
            .catch(error => console.error('Error updating table:', error));
    }
});



