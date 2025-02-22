document.getElementById('positionForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    console.log("Submitting form data:");
    formData.forEach((value, key) => console.log(`${key}:`, value));

    fetch('../../../app/models/modals/addPosition.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Position added successfully!');
            document.getElementById('SalaryManagementModal').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.querySelector('.modal-backdrop').remove();
            location.reload();
        } else {
            alert(`Error: ${data.message}`);
        }
    })

    .catch(error => console.error('Error:', error));
});