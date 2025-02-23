document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', (event) => {
        if (event.target && event.target.classList.contains('editPositionBtn')) {
            console.log("JS work 2");

            const positionID = event.target.getAttribute('data-positionID');
            const documentID = event.target.getAttribute('data-documentID');
            const positionName = event.target.getAttribute('data-positionName');
            const positionLevel = event.target.getAttribute('data-positionLevel');
            const salary = event.target.getAttribute('data-salary');
            const positionRequirments = event.target.getAttribute('data-positionRequirments');
    
            document.getElementById('editPositionID').value = positionID;
            document.getElementById('positionEditName').value = positionName;
            document.getElementById('positionEditLevel').value = positionLevel;
            document.getElementById('positionEditSalary').value = salary;
            document.getElementById('positionEditRequirements').value = positionRequirments;

        }
    });
});




document.getElementById('positionEditForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    console.log("Submitting form data:");
    formData.forEach((value, key) => console.log(`${key}:`, value));

    fetch('../../../app/models/modals/EditPosition.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Position updated successfully!');
            updateTable();
            document.getElementById('EditPositionModal').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.querySelector('.modal-backdrop').remove();
            
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error:', error));
});



