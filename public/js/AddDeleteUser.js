document.addEventListener('DOMContentLoaded', () => {
    // Делегирование событий на таблицу
    document.getElementById('employeeTable').addEventListener('click', event => {
        const button = event.target.closest('.Delete-button');
        if (button) {
            const employerId = button.getAttribute('data-employer-id');

            const name = button.getAttribute('data-name');
            const surname = button.getAttribute('data-surname');
            const fathername = button.getAttribute('data-fathername');
            const employerName = `${surname} ${name} ${fathername}`;
            
            const employerLevelID = button.getAttribute('data-access-level-id');
            const employerAccepted = button.getAttribute('data-date-accepted');
            
            document.getElementById('deleteEmployerId').textContent = employerId;
            document.getElementById('deleteEmployerName').textContent = employerName;
            document.getElementById('deleteEmployerLevel').textContent = employerLevelID;
            document.getElementById('deleteEmployerAccepted').textContent = employerAccepted;

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

    fetch('../../../app/models/modals/deleteEndpoint.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ employerID: employerId, password: adminPassword })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeAllModals();
            showSuccessDeleteModal();
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

