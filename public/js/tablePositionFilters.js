document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("positionsTable");
    const sortState = {
        positionLevel: 0, // 0 - неактивно, 1 - возрастание, 2 - убывание
        positionName: 0,
        salary: 0,
    };

    function saveRowsOrder() {
        Array.from(table.rows).forEach((row, index) => {
            row.dataset.originalIndex = index;
        });
    }

    saveRowsOrder();

    document.addEventListener("input", (event) => {
        if (event.target.matches("#positionLevelFilter, #positionNameFilter, #salaryFilter")) {
            applyFilters();
        }
    });

    document.addEventListener("click", (event) => {
        if (event.target.matches("#positionLevelFilter")) {
            toggleSort(3, "positionLevel");
        } else if (event.target.matches("#positionNameFilter")) {
            toggleSort(2, "positionName");
        } else if (event.target.matches("#salaryFilter")) {
            toggleSort(4, "salary");
        } else if (event.target.matches("#resetFilters")) {
            resetFilters();
        }
    });

    function getTableRows() {
        return Array.from(table.rows).filter(row => row.cells.length > 0);
    }

    function applyFilters() {
        const filters = {
            positionLevel: document.getElementById("positionLevelFilter").value.trim().toLowerCase(),
            positionName: document.getElementById("positionNameFilter").value.trim().toLowerCase(),
            salary: document.getElementById("salaryFilter").value.trim(),
        };

        getTableRows().forEach(row => {
            const cells = row.cells;
            const matchesPositionLevel = !filters.positionLevel || cells[3].textContent.trim().toLowerCase().includes(filters.positionLevel);
            const matchesPositionName = !filters.positionName || cells[2].textContent.trim().toLowerCase().includes(filters.positionName);
            const matchesSalary = !filters.salary || cells[4].textContent.trim().includes(filters.salary);

            row.style.display = matchesPositionLevel && matchesPositionName && matchesSalary ? "" : "none";
        });
    }

    function toggleSort(columnIndex, sortKey) {
        sortState[sortKey] = (sortState[sortKey] + 1) % 3; 

        if (sortState[sortKey] === 0) {
            resetSort();
            return;
        }

        const rows = getTableRows().filter(row => row.style.display !== "none"); 
        const ascending = sortState[sortKey] === 1;

        rows.sort((a, b) => {
            const valA = a.cells[columnIndex].textContent.trim();
            const valB = b.cells[columnIndex].textContent.trim();
            return isNaN(valA) || isNaN(valB)
                ? ascending ? valA.localeCompare(valB) : valB.localeCompare(valA)
                : ascending ? valA - valB : valB - valA;
        });

        rows.forEach(row => table.appendChild(row));

        Object.keys(sortState).forEach(key => {
            if (key !== sortKey) {
                sortState[key] = 0;
            }
        });
    }

    function resetSort() {
        const rows = getTableRows();
        rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
        rows.forEach(row => table.appendChild(row));
    }

    function resetFilters() {
        document.getElementById("positionLevelFilter").value = "";
        document.getElementById("positionNameFilter").value = "";
        document.getElementById("salaryFilter").value = "";

        getTableRows().forEach(row => {
            row.style.display = ""; 
        });

        resetSort();
    }
});
