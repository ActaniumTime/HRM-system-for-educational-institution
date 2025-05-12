document.querySelectorAll('.editEmployerBtn').forEach(button => {
    button.addEventListener('click', () => {
        // Аватар
        const avatarSrc = button.getAttribute('data-employer-avatar');
        document.querySelector('#EditCourseModal #employerAvatar').src = avatarSrc;

        // ID користувача
        const employerID = button.getAttribute('data-employer-id');
        document.querySelector('#empID_EditForm').value = employerID;

        const courseID = button.getAttribute('data-course-id');
        document.querySelector('#courseID_EditForm').value = courseID;

        // Назва користувача (если нужно, добавь отдельный data-* атрибут, например: data-employer-name)
        const empName = button.getAttribute('data-employer-name');
        if (empName) document.querySelector('#empName_EditForm').value = empName;

        const courseName = button.getAttribute('data-course-name');
        document.querySelector('#courseName_EditForm').value = courseName;

        const organizationName = button.getAttribute('data-course-rganization-name') || button.getAttribute('data-course-organization-name');
        document.querySelector('#organizationName_EditForm').value = organizationName;

        const startDate = button.getAttribute('data-course-start');
        document.querySelector('#startingDate_EditForm').value = startDate;

        const endDate = button.getAttribute('data-course-end');
        document.querySelector('#endingDate_EditForm').value = endDate;

        const hours = button.getAttribute('data-course-hours');
        document.querySelector('#hours_EditForm').value = hours;

        const credits = button.getAttribute('data-course-credit');
        document.querySelector('#credits_EditForm').value = credits;

        const documentID = button.getAttribute('data-course-document');
        document.querySelector('#docViewBtn1').setAttribute('data-documentID', documentID);

        const certificateID = button.getAttribute('data-course-sectificate');
        document.querySelector('#docViewBtn2').setAttribute('data-documentID', certificateID);

        const currentStat = button.getAttribute('data-course-curStatus');

        switch(currentStat){
            case 'Ongoing':
                document.querySelector('#Status_EditForm').value = 'Активний';
                var statusField = document.getElementById('Status_EditForm');
                statusField.style.backgroundColor = '#d4edda'; 
                statusField.style.color = '#155724'; 
                break;
            case 'Waiting':
                document.querySelector('#Status_EditForm').value = 'Очікує';
                var statusField = document.getElementById('Status_EditForm');
                statusField.style.backgroundColor = '#fff0c4'; 
                statusField.style.color = '#735600'; 
                break;
            case 'Completed':
                document.querySelector('#Status_EditForm').value = 'Завершений';
                var statusField = document.getElementById('Status_EditForm');
                statusField.style.backgroundColor = '#303030'; 
                statusField.style.color = 'white'; 
                break;
        }
    });
});

    document.getElementById('employeeTable').addEventListener('click', event => {
        const button3 = event.target.closest('.Info-button');
        if (button3) {
            const docID = button3.getAttribute('data-employer-id');
            window.open(`../../../app/models/GetData/getEmployerPage.php?emp_ID=${docID}`);
        }
    });