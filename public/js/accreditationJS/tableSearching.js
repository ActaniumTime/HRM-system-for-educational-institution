document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("searchIcon");
    const searchInput = document.getElementById("searchInput");
    const table = document.getElementById("accreditationTable");

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

    // Фильтрация таблицы
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        filterTable(query);
    });

    function filterTable(query) {
        Array.from(table.rows).forEach(row => {
            // Пропустить строку заголовков
            if (row.rowIndex === 0) return;

            const cells = Array.from(row.cells).slice(2); // Начинаем с 3-го столбца (ПІБ співробітника)
            const matches = cells.some(cell => cell.textContent.toLowerCase().includes(query));

            row.style.display = matches ? "" : "none";
        });
    }
});
