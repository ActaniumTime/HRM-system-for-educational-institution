document.addEventListener('DOMContentLoaded', () => {
    // Делегирование событий на таблицу
    document.getElementById('employeeTable').addEventListener('click', event => {
        const button = event.target.closest('.Delete-button');
        if (button) {
            const employerId = button.getAttribute('data-employer-id');
            const courseID = button.getAttribute('data-course-id');
            const employerName = button.getAttribute('data-employer-name');

            const orgName = button.getAttribute('data-course-organization-name');
            const courseName = button.getAttribute('data-course-name');
            let courseStatus = button.getAttribute('data-course-status');
            
            switch(courseStatus) {
                case "Completed" : 
                    courseStatus = "Завершений";
                    break;
                case "Ongoing":
                    courseStatus = "Активний";
                    break;
                case "Waiting":
                    courseStatus = "Очікує";
                    break;
            }

            document.getElementById('courseID_deleteForm').textContent = courseID;
            document.getElementById('employerName_deleteForm').textContent = employerName;
            document.getElementById('courseName_deleteForm').textContent = courseName;
            document.getElementById('organizationName_deleteForm').textContent = orgName;
            document.getElementById('currentStatus_deleteForm').textContent = courseStatus;

            const confirmButton = document.getElementById('confirmDeleteEmployer');
            confirmButton.onclick = () => deleteEmployer(employerId, button.closest('tr'));
        }
    });
});

function deleteEmployer(employerId, tableRow) {
    const adminPassword = document.getElementById('adminPassword').value;

    if (!adminPassword) {
        alert('Введить пароль адміністратору.');
        return;
    }

    fetch('../../../app/models/modals/DeleteCourse.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            employerID: employerId,
            password: adminPassword,
            courseID_deleteForm: document.getElementById('courseID_deleteForm').textContent
        })
        
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            closeAllModals();
            showSuccessDeleteCourseModal();

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

