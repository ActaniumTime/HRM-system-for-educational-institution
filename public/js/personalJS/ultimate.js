document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation(); // Останавливает дальнейшую обработку события
        });
    });
    
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('employeeTable1').addEventListener('click', event => {
            const button = event.target.closest('.docViewBtn1');
            if (button) {
                const docID = button.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }
    
            const button2 = event.target.closest('.docViewBtn2');
            if (button2) {
                const docID = button2.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }


        });

        document.getElementById('documentTable').addEventListener('click', event => {
            const button3 = event.target.closest('.docViewBtn3');
            if (button3) {
                const docID = button3.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }
        });
    });