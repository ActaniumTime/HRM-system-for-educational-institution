
    const tableBody = document.getElementById("employeeTable");
    const rowsOriginalOrder = Array.from(tableBody.rows); 

    const filterBtn = document.getElementById("sortByState");
    const tableRows = document.querySelectorAll("#employeeTable .table-row");
    const states = ["Ongoing", "Waiting", "Complited"];
    let filterIndex = 0;

    filterBtn.addEventListener("click", () => {
        if (filterIndex === 3) {
            showAllRows();
            filterIndex = 0;
            return;
        }

        const currentState = states[filterIndex];
        tableRows.forEach(row => {
            const statusCell = row.querySelector("td:nth-child(10) div");
            row.style.display = (statusCell && statusCell.id === currentState) ? "" : "none";
        });

        filterIndex++;
    });

    const sortByDateBegin = document.getElementById("sortByDateBegin");
    let beginSortState = 0;

    sortByDateBegin.addEventListener("click", () => {
        if (beginSortState === 2) {
            resetToOriginal();
            beginSortState = 0;
            return;
        }

        const rows = Array.from(tableBody.rows).filter(row => row.style.display !== "none");
        rows.sort((a, b) => {
            const aDate = new Date(a.cells[5].innerText.trim());
            const bDate = new Date(b.cells[5].innerText.trim());
            return beginSortState === 0 ? aDate - bDate : bDate - aDate;
        });

        redrawTable(rows);
        beginSortState++;
    });

    const sortByDateEnd = document.getElementById("sortByDateEnd");
    let endSortState = 0;

    sortByDateEnd.addEventListener("click", () => {
        if (endSortState === 2) {
            resetToOriginal();
            endSortState = 0;
            return;
        }

        const rows = Array.from(tableBody.rows).filter(row => row.style.display !== "none");
        rows.sort((a, b) => {
            const aDate = new Date(a.cells[6].innerText.trim());
            const bDate = new Date(b.cells[6].innerText.trim());
            return endSortState === 0 ? aDate - bDate : bDate - aDate;
        });

        redrawTable(rows);
        endSortState++;
    });

    const resetFilters = document.getElementById("resetFilters");
    resetFilters.addEventListener("click", () => {
        showAllRows();
        resetToOriginal();
        filterIndex = 0;
        beginSortState = 0;
        endSortState = 0;
    });

    function showAllRows() {
        tableRows.forEach(row => row.style.display = "");
    }

    function redrawTable(rows) {
        tableBody.innerHTML = "";
        rows.forEach(row => tableBody.appendChild(row));
    }

    function resetToOriginal() {
        redrawTable(rowsOriginalOrder);
    }

    document.querySelectorAll('.no-click').forEach(element => {
        element.addEventListener('click', event => event.stopPropagation());
    });
