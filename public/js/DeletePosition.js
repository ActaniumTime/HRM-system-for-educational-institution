document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('positionsTable').addEventListener('click', event=>{
        const button = event.target.closest('.Delete-button');
        if(button){
            const positionID = button.getAttribute('data-positionID');
            const positionName =  button.getAttribute('data-positionName');
            const positionLevel =  button.getAttribute('data-positionLevel');
            const positionRequirments =  button.getAttribute('data-positionRequirments');
            const documentID =  button.getAttribute('data-documentID');
            const salary =  button.getAttribute('data-salary');
            
            document.getElementById('deletePositionID').textContent = positionID;
            document.getElementById('deletePositionName').textContent = positionName;
            document.getElementById('deletePositionLevel').textContent = positionLevel;
            document.getElementById('deleteSalary').textContent = salary;
            
            const confirmButton = document.getElementById('confirmDeletPosition');
            confirmButton.onclick = () => deletePosition(positionID, button.closest('tr'));
        }
    })
})





function deletePosition(positionID, tableRow){
    const adminPass = document.getElementById('adminPassword').value;

    if(!adminPass){
        alert('Please enter your password!');
        return;
    }



    fetch('../../../app/models/modals/deletePosition.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ positionID: positionID, password: adminPass }) 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Position deleted successfully.');
            if (tableRow) {
                tableRow.remove();
            }
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the position.');
    });
}