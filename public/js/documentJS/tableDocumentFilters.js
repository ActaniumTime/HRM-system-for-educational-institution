document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("documentTable");
    const searchInput = document.getElementById("searchInput");
    const categoryFilter = document.getElementById("category");
    const docTypeFilter = document.getElementById("docType");
    const resetButton = document.getElementById("resetFilters");

    const sortState = {
        documentName: 0,
        ownerName: 0
    };

    function saveRowsOrder() {
        Array.from(table.rows).forEach((row, index) => {
            row.dataset.originalIndex = index;
        });
    }

    saveRowsOrder();

    document.addEventListener("click", (event) => {
        if (event.target.closest("#positionNameFilter")) {
            toggleSort(3, "documentName");
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
            return ascending ? valA.localeCompare(valB) : valB.localeCompare(valA);
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
            // Обновление иконки сортировки (если требуется)
        });
    }

    function resetSort() {
        const rows = getTableRows();
        rows.sort((a, b) => a.dataset.originalIndex - b.dataset.originalIndex);
        rows.forEach(row => table.appendChild(row));
        updateSortIcons();
    }

    function filterTable() {
        const searchText = searchInput.value.trim().toLowerCase();
        const categoryValue = categoryFilter.value;
        const docTypeValue = docTypeFilter.value;

        getTableRows().forEach(row => {
            const documentName = row.cells[3].textContent.toLowerCase();
            const ownerName = row.cells[2].textContent.toLowerCase();
            const category = row.cells[4].textContent;
            const docType = row.cells[6].textContent;

            const matchesSearch = documentName.includes(searchText) || ownerName.includes(searchText);
            const matchesCategory = !categoryValue || category === categoryValue;
            const matchesDocType = !docTypeValue || docType === docTypeValue;

            row.style.display = matchesSearch && matchesCategory && matchesDocType ? "" : "none";
        });
    }

    function resetFilters() {
        searchInput.value = "";
        categoryFilter.value = "";
        docTypeFilter.value = "";
        getTableRows().forEach(row => row.style.display = "");
        resetSort();
    }

    searchInput.addEventListener("input", filterTable);
    categoryFilter.addEventListener("change", filterTable);
    docTypeFilter.addEventListener("change", filterTable);
    resetButton.addEventListener("click", resetFilters);
});
