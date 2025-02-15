document.addEventListener('DOMContentLoaded', () =>{
    document.getElementById('positionsTable').addEventListener('click', event=>{
        const button = event.target.closest('.docViewBtn');
        if(button){
            const docID = button.getAttribute('data-documentID');
            
            fetch('../../../app/models/GetData/getDocument.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ documentID: docID})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('File has been requested!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while requesting the file');
            });
        }
    })
} )
