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
        const query = searchInput.value.toLowerCase().trim();
        filterTable(query);
    });

    function filterTable(query) {
        Array.from(table.rows).forEach(row => {
            const positionName = row.cells[2]?.textContent.toLowerCase() || "";
            const positionLevel = row.cells[3]?.textContent.toLowerCase() || "";
            const positionLevel1 = row.cells[4]?.textContent.toLowerCase() || "";

            const matches = positionName.includes(query) || positionLevel.includes(query) || positionLevel1.includes(query);
            row.style.display = matches ? "" : "none";
        });
    }
});
