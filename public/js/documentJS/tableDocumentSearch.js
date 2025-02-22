document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("searchIcon");
    const searchInput = document.getElementById("searchInput");
    const table = document.getElementById("positionsTable"); // ID tbody

    // Показать/скрыть строку поиска
    searchIcon.addEventListener("click", () => {
        searchInput.classList.toggle("active");
        if (searchInput.classList.contains("active")) {
            searchInput.focus();
        } else {
            searchInput.value = "";
            filterTable("");
        }
    });

    // Фильтрация таблицы по названию позиции и уровню
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase().trim();
        filterTable(query);
    });

    function filterTable(query) {
        Array.from(table.rows).forEach(row => {
            const positionName = row.cells[2]?.textContent.toLowerCase() || "";
            const positionLevel = row.cells[3]?.textContent.toLowerCase() || "";

            const matches = positionName.includes(query) || positionLevel.includes(query);
            row.style.display = matches ? "" : "none";
        });
    }
});
