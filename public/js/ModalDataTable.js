document.addEventListener('DOMContentLoaded', () => {

    const editButtons = document.querySelectorAll('.editEmployerBtn');
    
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const employerID = button.getAttribute('data-employer-id');
            const accessLevelID = button.getAttribute('data-access-level-id');
            const name = button.getAttribute('data-name');
            const surname = button.getAttribute('data-surname');
            const fathername = button.getAttribute('data-fathername');
            const birthday = button.getAttribute('data-birthday');
            const gender = button.getAttribute('data-gender');
            const passportID = button.getAttribute('data-passport-id');
            const homeAddress = button.getAttribute('data-home-address');
            const email = button.getAttribute('data-email');
            const phoneNumber = button.getAttribute('data-phone-number');
            const department = button.getAttribute('data-department');
            const dateAccepted = button.getAttribute('data-date-accepted');
            const currentStatus = button.getAttribute('data-current-status');
            const dateFired = button.getAttribute('data-date-fired');
            const admissionBasis = button.getAttribute('data-admission-basis');
            const employmentType = button.getAttribute('data-employment-type');
            
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
        });
    });
});