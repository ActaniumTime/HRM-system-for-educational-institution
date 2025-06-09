document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("employeeTable");
    const sortState = {
        birthday: 0,
        dateAccepted: 0,
        dateFired: 0,
    };

    function saveRowsOrder(){

    Array.from(table.rows).forEach((row, index) => {
        if (row.cells.length > 0) {
            row.dataset.originalIndex = index; 
        }
    });1
    }

    saveRowsOrder();

    document.addEventListener("change", (event) => {
        if (event.target.matches("#accessLevelFilter, #genderFilter, #departmentFilter, #employmentTypeFilter")) {
            applyFilters();
        }
    });

    document.addEventListener("click", (event) => {
        if (event.target.matches("#sortByBirthday")) {
            toggleSort(6, "birthday");
        } else if (event.target.matches("#sortByDateAccepted")) {
            toggleSort(11, "dateAccepted");
        } else if (event.target.matches("#sortByDateFired")) {
            toggleSort(12, "dateFired");
        } else if (event.target.matches("#resetFilters")) {
            resetFilters();
        }
    });

    function getTableRows() {
        return Array.from(table.rows).filter((row) => row.cells.length > 0); 
    }

    function applyFilters() {
        const filters = {
            accessLevel: document.getElementById("accessLevelFilter").value,
            gender: document.getElementById("genderFilter").value.toLowerCase(),
            department: document.getElementById("departmentFilter").value.toLowerCase(),
            employmentType: document.getElementById("employmentTypeFilter").value.toLowerCase(),
        };

        getTableRows().forEach((row) => {
            const cells = row.cells;
            const matchesAccessLevel = !filters.accessLevel || cells[2].textContent.trim() === filters.accessLevel;
            const matchesGender = !filters.gender || cells[7].textContent.trim().toLowerCase() === filters.gender;
            const matchesDepartment = !filters.department || cells[10].textContent.trim().toLowerCase().includes(filters.department);
            const matchesEmploymentType = !filters.employmentType || cells[13].textContent.trim().toLowerCase().includes(filters.employmentType);

            row.style.display = matchesAccessLevel && matchesGender && matchesDepartment && matchesEmploymentType ? "" : "none";
        });
    }

    function toggleSort(columnIndex, sortKey) {
        sortState[sortKey] = (sortState[sortKey] + 1) % 3; 

        if (sortState[sortKey] === 0) {
            resetSort();
            return;
        }

        const rows = getTableRows().filter((row) => row.style.display !== "none");
        const ascending = sortState[sortKey] === 1;

        rows.sort((a, b) => {
            const valA = a.cells[columnIndex].textContent.trim();
            const valB = b.cells[columnIndex].textContent.trim();
            return isNaN(Date.parse(valA))
                ? ascending ? valA.localeCompare(valB) : valB.localeCompare(valA)
                : ascending ? new Date(valA) - new Date(valB) : new Date(valB) - new Date(valA);
        });

        rows.forEach((row) => table.appendChild(row));

        Object.keys(sortState).forEach((key) => {
            if (key !== sortKey) {
                sortState[key] = 0;
            }
        });
    }

    function resetSort() {
        const rows = getTableRows();
        rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
        rows.forEach((row) => table.appendChild(row));
    }

function resetFilters() {
    document.getElementById("accessLevelFilter").value = "";
    document.getElementById("genderFilter").value = "";
    document.getElementById("departmentFilter").value = "";
    document.getElementById("employmentTypeFilter").value = "";

    const rows = getTableRows();
    let visibleIndex = 1;

    rows.forEach((row) => {
        const isInactive = row.classList.contains("inactive-row");
        row.style.display = isInactive ? "none" : "";

        const cell = row.querySelector("th[scope='row']");
        if (!isInactive && cell) {
            cell.textContent = visibleIndex++;
        }
    });

    // Сортировка по изначальному порядку
    rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
    rows.forEach((row) => table.appendChild(row));

    // Сброс состояний сортировки
    Object.keys(sortState).forEach((key) => {
        sortState[key] = 0;
    });
}


    
});

document.addEventListener("DOMContentLoaded", function () {
    let tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("toggleFilterBtn");
    const table = document.getElementById("employeeTable");
    let state = 0; // 0: Active, 1: Inactive, 2: All

    function updateTable() {
        // Получаем актуальные строки таблицы (исключая заголовок)
        const rows = Array.from(table.querySelectorAll("tbody tr"));
        let visibleIndex = 1;

        rows.forEach(row => {
            const isInactive = row.classList.contains("inactive-row");

            let shouldShow = false;
            switch (state) {
                case 0:
                    shouldShow = !isInactive;
                    break;
                case 1:
                    shouldShow = isInactive;
                    break;
                case 2:
                    shouldShow = true;
                    break;
            }

            row.style.display = shouldShow ? "" : "none";

            // Обновляем номер строки, если она отображается
            const cell = row.querySelector("th[scope='row']");
            if (shouldShow && cell) {
                cell.textContent = visibleIndex++;
            }
        });

        // Обновляем иконку кнопки
        switch (state) {
            case 0:
                button.innerHTML = '<i class="fi fi-sr-delete-user no-click"></i>';
                break;
            case 1:
                button.innerHTML = '<i class="fi fi-sr-people-line no-click"></i>';
                break;
            case 2:
                button.innerHTML = '<i class="fi fi-sr-user-add no-click"></i>';
                break;
        }
    }

    button.addEventListener("click", () => {
        state = (state + 1) % 3;
        updateTable();
    });

    updateTable();
});
