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


    

    document.addEventListener("DOMContentLoaded", function () {
        const button = document.getElementById("toggleFilterBtn");
        const table = document.getElementById("employeeTable");
        const allRows = Array.from(table.querySelectorAll("tr"));
        let state = 0; // 0: Active, 1: Inactive, 2: All

        function updateTable() {
            let visibleRows = [];

            allRows.forEach(row => {
                const isInactive = row.classList.contains("inactive-row");

                switch (state) {
                    case 0: // Only active
                        row.style.display = isInactive ? "none" : "";
                        if (!isInactive) visibleRows.push(row);
                        break;
                    case 1: // Only inactive
                        row.style.display = isInactive ? "" : "none";
                        if (isInactive) visibleRows.push(row);
                        break;
                    case 2: // All
                        row.style.display = "";
                        visibleRows.push(row);
                        break;
                }
            });

            visibleRows.forEach((row, index) => {
                const cell = row.querySelector("th[scope='row']");
                if (cell) cell.textContent = index + 1;
            });

            switch (state) {
                case 0:
                    button.innerHTML = '<i class="fi fi-sr-delete-user no-click">';
                    break;
                case 1:
                    button.innerHTML = '<i class="fi fi-sr-people-line no-click">';
                    break;
                case 2:
                    button.innerHTML = '<i class="fi fi-sr-user-add no-click">';
                    break;
            }
        }

        button.addEventListener("click", () => {
            state = (state + 1) % 3;
            updateTable();
        });

        updateTable(); 
    });