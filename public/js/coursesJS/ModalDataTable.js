document.addEventListener('DOMContentLoaded', () => {
    // Используем делегирование событий на весь документ
    document.addEventListener('click', (event) => {
        // Проверяем, что клик был по кнопке с классом .editEmployerBtn
        if (event.target && event.target.classList.contains('editEmployerBtn')) {
            console.log("JS work 2");

            // Получаем все атрибуты из кнопки
            const employerID = event.target.getAttribute('data-employer-id');
            const courseID = event.target.getAttribute('data-course-id');
            const CourseName = event.target.getAttribute('data-course-name');
            const OrgName = event.target.getAttribute('data-course-rganization-name');
            const StartDay = event.target.getAttribute('data-course-start');
            const EndDay = event.target.getAttribute('data-course-end');
            const CourseDoc = event.target.getAttribute('data-course-document');
            const Srtificate = event.target.getAttribute('data-course-sectificate');
            const homeAddress = event.target.getAttribute('data-home-address');
            const email = event.target.getAttribute('data-email');
            const phoneNumber = event.target.getAttribute('data-phone-number');
            const department = event.target.getAttribute('data-department');
            const dateAccepted = event.target.getAttribute('data-date-accepted');
            const currentStatus = event.target.getAttribute('data-current-status');
            const dateFired = event.target.getAttribute('data-date-fired');
            const admissionBasis = event.target.getAttribute('data-admission-basis');
            const employmentType = event.target.getAttribute('data-employment-type');
            
            // Обновляем элементы в модальном окне
            const photoElement = document.getElementById('employerAvatar');
            photoElement.src = employerAvatar;

            // Заполняем поля формы
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
});
