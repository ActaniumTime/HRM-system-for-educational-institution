document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("searchIcon");
    const searchInput = document.getElementById("searchInput");
    const table = document.getElementById("employeeTable");

    searchIcon.addEventListener("click", () => {
        searchInput.classList.toggle("active");
        if (searchInput.classList.contains("active")) {
            searchInput.focus();
        } else {
            searchInput.value = "";
            filterTable("");
        }
    });

    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        filterTable(query);
    });

    function filterTable(query) {
        Array.from(table.rows).forEach(row => {
            const cells = Array.from(row.cells).slice(2, 5); 
            const matches = cells.some(cell => cell.textContent.toLowerCase().includes(query));
            row.style.display = matches ? "" : "none";
        });
    }
});