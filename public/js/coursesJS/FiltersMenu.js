document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("employeeTable");
    const buttonStateSort = document.getElementById("sortByState");
    const buttonDateBegin = document.getElementById("sortByDateBegin");
    const buttonDateEnd = document.getElementById("sortByDateEnd");
    const resetButton = document.getElementById("resetFilters");

    const sortState = {
        state: 0,
        dateBegin: 0,
        dateEnd: 0,
    };

    const stateCycle = ["Ongoing", "Waiting", "Complited"];
    let currentStateIndex = 0;

    function saveOriginalOrder() {
        Array.from(table.rows).forEach((row, index) => {
            if (row.cells.length > 0) {
                row.dataset.originalIndex = index;
            }
        });
    }

    saveOriginalOrder();

    function getTableRows() {
        return Array.from(table.rows).filter(row => row.cells.length > 0);
    }

    function applyStateFilter() {
        const rows = getTableRows();
        if (sortState.state === 0) {
            rows.forEach(row => row.style.display = "");
        } else {
            const targetState = stateCycle[currentStateIndex];
            rows.forEach(row => {
                const statusCell = row.querySelector("td:nth-child(10) div");
                row.style.display = (statusCell && statusCell.id === targetState) ? "" : "none";
            });
        }
        updateRowNumbers();
    }

    function sortByDate(columnIndex, key) {
        sortState[key] = (sortState[key] + 1) % 3;

        if (sortState[key] === 0) {
            resetSort();
            return;
        }

        const ascending = sortState[key] === 1;
        const rows = getTableRows().filter(row => row.style.display !== "none");

        rows.sort((a, b) => {
            const aDate = new Date(a.cells[columnIndex].textContent.trim());
            const bDate = new Date(b.cells[columnIndex].textContent.trim());
            return ascending ? aDate - bDate : bDate - aDate;
        });

        rows.forEach(row => table.appendChild(row));
        updateRowNumbers();

        Object.keys(sortState).forEach(k => {
            if (k !== key) sortState[k] = 0;
        });
    }

    function resetSort() {
        const rows = getTableRows();
        rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
        rows.forEach(row => table.appendChild(row));
        updateRowNumbers();
    }

    function updateRowNumbers() {
        const rows = getTableRows();
        let visibleIndex = 1;

        rows.forEach(row => {
            if (row.style.display !== "none") {
                const indexCell = row.querySelector("th[scope='row']");
                if (indexCell) {
                    indexCell.textContent = visibleIndex++;
                }
            }
        });
    }

    function resetAllFilters() {
        const rows = getTableRows();

        rows.forEach(row => {
            const isInactive = row.classList.contains("inactive-row");
            row.style.display = isInactive ? "none" : "";
        });

        resetSort();

        sortState.state = 0;
        sortState.dateBegin = 0;
        sortState.dateEnd = 0;
        currentStateIndex = 0;
    }

    buttonStateSort.addEventListener("click", () => {
        sortState.state = (sortState.state + 1) % 4;
        currentStateIndex = (sortState.state - 1 + stateCycle.length) % stateCycle.length;
        applyStateFilter();
    });

    buttonDateBegin.addEventListener("click", () => {
        sortByDate(5, "dateBegin");
    });

    buttonDateEnd.addEventListener("click", () => {
        sortByDate(6, "dateEnd");
    });

    resetButton.addEventListener("click", () => {
        resetAllFilters();
    });

    document.querySelectorAll('.no-click').forEach(element => {
        element.addEventListener('click', event => event.stopPropagation());
    });
});
