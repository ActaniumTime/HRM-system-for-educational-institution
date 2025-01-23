document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.Delete-button');
    const deleteModal = document.getElementById('deleteEmployerModal');
    const confirmDeleteButton = document.getElementById('confirmDeleteEmployer');
    const deleteEmployerIDInput = document.getElementById('deleteEmployerID');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const employerID = this.dataset.employerId;
            deleteEmployerIDInput.value = employerID;
            const modal = new bootstrap.Modal(deleteModal);
            modal.show();
        });
    });

    confirmDeleteButton.addEventListener('click', function () {
        const employerID = deleteEmployerIDInput.value;

        fetch('delete_employer.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `employerID=${encodeURIComponent(employerID)}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message);
                    location.reload(); // Reload the page to update the table
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while trying to delete the employer.');
            });
    });
});
