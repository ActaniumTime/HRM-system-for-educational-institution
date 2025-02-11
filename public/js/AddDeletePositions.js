document.getElementById('positionForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    console.log('Submitted data:', Object.fromEntries(formData.entries()));

    fetch('/save_salary', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Salary updated successfully!');
            location.reload();
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error:', error));
});