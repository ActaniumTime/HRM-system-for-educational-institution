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
