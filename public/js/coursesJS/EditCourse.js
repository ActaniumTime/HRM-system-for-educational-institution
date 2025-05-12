document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('EditCourseModal').addEventListener('click', event => {
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
});

document.getElementById('EditCourseModal_EditForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    let jsonData = {};

    console.log('Отправляемые данные:', jsonData);

    fetch('../../../app/models/modals/EditCourses.php', {
        method: 'POST',
        body: formData, 
    })
        .then(response => response.json())
        .then(result => {
            console.log('Результат сервера:', result);
            if (result.success) {
                closeAllModals();
                showSuccessUpdateCourseModal();

            } else {
                alert(`Ошибка: ${result.message}`);
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });

    });