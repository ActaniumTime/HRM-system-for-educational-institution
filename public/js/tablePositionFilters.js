document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("positionsTable");
    const sortState = {
        positionLevel: 0,
        positionName: 0,
        salary: 0,
    };

    function saveRowsOrder() {
        Array.from(table.rows).forEach((row, index) => {
            row.dataset.originalIndex = index;
        });
    }

    saveRowsOrder();

    document.addEventListener("click", (event) => {
        if (event.target.closest("#positionLevelFilter")) {
            toggleSort(3, "positionLevel");
        } else if (event.target.closest("#positionNameFilter")) {
            toggleSort(2, "positionName");
        } else if (event.target.closest("#salaryFilter")) {
            toggleSort(4, "salary");
        } else if (event.target.closest("#resetFilters")) {
            resetFilters();
        }
    });

    function getTableRows() {
        return Array.from(table.rows).filter(row => row.cells.length > 0);
    }

    function toggleSort(columnIndex, sortKey) {
        sortState[sortKey] = (sortState[sortKey] + 1) % 3;

        updateSortIcons();

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

    function updateSortIcons() {
        document.querySelectorAll(".sort-btn").forEach(btn => {
            const key = btn.id.replace("Filter", "");
            const indicator = btn.querySelector(".sort-indicator");

            if (!indicator) return;

        });
    }

    function resetSort() {
        const rows = getTableRows();
        rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
        rows.forEach(row => table.appendChild(row));
        updateSortIcons();
    }

    function resetFilters() {
        document.getElementById("positionLevelFilter").value = "";
        document.getElementById("positionNameFilter").value = "";
        document.getElementById("salaryFilter").value = "";

        getTableRows().forEach(row => row.style.display = "");

        resetSort();
    }
});
