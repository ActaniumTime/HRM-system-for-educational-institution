document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("employeeTable");
    const sortState = {
        birthday: 0, // 0 - неактивно, 1 - возрастание, 2 - убывание
        dateAccepted: 0,
        dateFired: 0,
    };

    function saveRowsOrder(){
            // Сохраняем исходный порядок строк
    Array.from(table.rows).forEach((row, index) => {
        if (row.cells.length > 0) {
            row.dataset.originalIndex = index; // Сохраняем индекс в атрибуте
        }
    });1
    }

    saveRowsOrder();

    // Делегирование событий для фильтров
    document.addEventListener("change", (event) => {
        if (event.target.matches("#accessLevelFilter, #genderFilter, #departmentFilter, #employmentTypeFilter")) {
            applyFilters();
        }
    });

    // Делегирование событий для сортировки
    document.addEventListener("click", (event) => {
        if (event.target.matches("#sortByBirthday")) {
            toggleSort(6, "birthday");
        } else if (event.target.matches("#sortByDateAccepted")) {
            toggleSort(13, "dateAccepted");
        } else if (event.target.matches("#sortByDateFired")) {
            toggleSort(15, "dateFired");
        } else if (event.target.matches("#resetFilters")) {
            resetFilters();
        }
    });11

    function getTableRows() {
        return Array.from(table.rows).filter((row) => row.cells.length > 0); // Исключаем строки заголовков
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
            const matchesDepartment = !filters.department || cells[12].textContent.trim().toLowerCase().includes(filters.department);
            const matchesEmploymentType = !filters.employmentType || cells[17].textContent.trim().toLowerCase().includes(filters.employmentType);

            row.style.display = matchesAccessLevel && matchesGender && matchesDepartment && matchesEmploymentType ? "" : "none";
        });
    }

    function toggleSort(columnIndex, sortKey) {
        sortState[sortKey] = (sortState[sortKey] + 1) % 3; // Переключение между 0, 1, 2

        if (sortState[sortKey] === 0) {
            resetSort();
            return;
        }

        const rows = getTableRows().filter((row) => row.style.display !== "none"); // Только видимые строки
        const ascending = sortState[sortKey] === 1;

        rows.sort((a, b) => {
            const valA = a.cells[columnIndex].textContent.trim();
            const valB = b.cells[columnIndex].textContent.trim();
            return isNaN(Date.parse(valA))
                ? ascending ? valA.localeCompare(valB) : valB.localeCompare(valA)
                : ascending ? new Date(valA) - new Date(valB) : new Date(valB) - new Date(valA);
        });

        rows.forEach((row) => table.appendChild(row));

        // Сброс состояний других кнопок
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
        // Сбрасываем значения фильтров
        document.getElementById("accessLevelFilter").value = "";
        document.getElementById("genderFilter").value = "";
        document.getElementById("departmentFilter").value = "";
        document.getElementById("employmentTypeFilter").value = "";
    
        // Восстанавливаем исходный порядок строк и показываем все строки
        const rows = getTableRows();
        rows.forEach((row) => {
            row.style.display = ""; // Показываем все строки
        });
    
        // Сортировка по начальному порядку
        rows.sort((a, b) => parseInt(a.cells[0].textContent.trim()) - parseInt(b.cells[0].textContent.trim()));
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

