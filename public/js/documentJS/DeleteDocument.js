document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('documentTable').addEventListener('click', event=>{
        const button = event.target.closest('.Delete-button');
        if(button){
            const documentID = button.getAttribute('data-documentID');
            const ownerID =  button.getAttribute('data-ownerID');
            const documentName =  button.getAttribute('data-documentName');
            const sphere =  button.getAttribute('data-sphere');
            const purpose =  button.getAttribute('data-purpose');
            const docType =  button.getAttribute('data-docType');
            
            document.getElementById('deleteDocumentID').textContent = documentID;
            document.getElementById('deleteDocumentName').textContent = documentName;
            document.getElementById('deleteDocumentOwner').textContent = ownerID;
            document.getElementById('deleteDocumentCat').textContent = docType;
            
            const confirmButton = document.getElementById('confirmDeletPosition');
            confirmButton.onclick = () => deletePosition(documentID, button.closest('tr'));
        }
    })
})





function deletePosition(documentID, tableRow){
    const adminPass = document.getElementById('adminPassword').value;

    if(!adminPass){
        alert('Please enter your password!');
        return;
    }

    fetch('../../../app/models/modals/deleteDocument.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ documentID: documentID, password: adminPass }) 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Document deleted successfully.');
            if (tableRow) {
                tableRow.remove();
            }

        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the document.');
    });
}