document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', (event) => {
        if (event.target && event.target.classList.contains('editEmployerBtn')) {
            console.log("JS work 2");
            const empID = event.target.getAttribute('data-employer-id');
            const acredID = event.target.getAttribute('data-accreditation-id');
            const accredPlan = event.target.getAttribute('data-accreditation-plan');
            const documentYears = event.target.getAttribute('data-document-years');
            const finDay = event.target.getAttribute('data-finish-day');
            const expYears = event.target.getAttribute('data-expirience-years');
            const empName = event.target.getAttribute('data-emp-name');
            const empCategory = event.target.getAttribute('data-emp-cat');
            let accPlan = {};
            let docYears = {};
            let fDay = {};
            try{
                accPlan = JSON.parse(accredPlan);   
                accPlan = JSON.parse(documentYears);
                accPlan = JSON.parse(finDay);
            }
            catch (error) {
                console.error('Ошибка парсинга:', error);
            }


            document.getElementById('teacherNameModal').value = empName;
            document.getElementById('accreditationID').value = acredID;
            document.getElementById('employerIDmodal').value = empID;
            document.getElementById('currentYearModal').value = expYears;
            document.getElementById('currentCategoryModal').value = empCategory;
        }
    });

});

    document.getElementById('accreditationTable').addEventListener('click', event => {
        const button30 = event.target.closest('.Info-button');
        if (button30) {
            const docID = button30.getAttribute('data-employer-id');
            window.open(`../../../app/models/GetData/getEmployerPage.php?emp_ID=${docID}`);
        }
    });

        document.getElementById('employeeTable').addEventListener('click', event => {
        const button30 = event.target.closest('.Info-button');
        if (button30) {
            const docID = button30.getAttribute('data-employer-id');
            window.open(`../../../app/models/GetData/getEmployerPage.php?emp_ID=${docID}`);
        }
    });

document.addEventListener("DOMContentLoaded", () => {
    const editBtns = document.querySelectorAll(".editEmployerBtn");

    editBtns.forEach((btn) => {
        btn.addEventListener("click", () => {

            const finishDay = JSON.parse(btn.getAttribute("data-finish-day"))
            const accreditationPlan = JSON.parse(btn.getAttribute("data-accreditation-plan"));
            const documentYears = JSON.parse(btn.getAttribute("data-document-years"));
            const experienceYears = btn.getAttribute("data-expirience-years");

            const categoryMapping = {
                "Спеціаліст": 1,
                "Спеціаліст другої категорії": 2,
                "Спеціаліст першої категорії": 3,
                "Спеціаліст вищої категорії": 4,
                "Підтвердження вищої категорії": 5,
                "Підтвердження вищої категорії 2": 6
            };

            for (const [category, year] of Object.entries(accreditationPlan)) {
                const categoryId = categoryMapping[category];
                if (categoryId && year) {
                    document.getElementById(`accreditationYearModal${categoryId}`).value = year;
                    
                }
            }

            const sortedYears = Object.entries(documentYears)

            const docButtons = document.querySelectorAll('.docViewBtn');
            docButtons.forEach((btn, index) => {
                if (sortedYears[index]) {
                    const [, documentID] = sortedYears[index];
                    btn.setAttribute('data-documentID', documentID);
                } else {
                    btn.setAttribute('data-documentID', '');
                }
            });

            for (const [category, year] of Object.entries(finishDay)) {
                const categoryId = categoryMapping[category];
                if (categoryId && year) {
                    document.getElementById(`accreditationDateModal${categoryId}`).value = year;
                }
            }

            

        });
    });
});


    document.addEventListener("DOMContentLoaded", function () {
        const button = document.getElementById("toggleFilterBtn");
        const table = document.getElementById("accreditationTable");
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