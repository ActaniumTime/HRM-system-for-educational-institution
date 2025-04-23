document.querySelectorAll('.no-click').forEach(element => {
    element.addEventListener('click', event => {
        event.stopPropagation(); // Останавливает дальнейшую обработку события
        });
    });
    
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('employeeTable1').addEventListener('click', event => {
            const button = event.target.closest('.docViewBtn1');
            if (button) {
                const docID = button.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }
    
            const button2 = event.target.closest('.docViewBtn2');
            if (button2) {
                const docID = button2.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }


        });

        document.getElementById('documentTable').addEventListener('click', event => {
            const button3 = event.target.closest('.docViewBtn3');
            if (button3) {
                const docID = button3.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID}`, '_blank');
            }
        });
    });







    document.addEventListener('DOMContentLoaded', () => {
        document.addEventListener('click', (event) => {
            if (event.target && event.target.classList.contains('editEmployerBtn')) {
                console.log("JS work 2");
                const empID = event.target.getAttribute('data-employer-id');
                const acredID = event.target.getAttribute('data-accreditation-id');
                const accredPlan = event.target.getAttribute('data-accreditation-plan');
                const documentYears = event.target.getAttribute('data-document-years');
                const finDay = event.target.getAttribute('data-finish-day');
                const expYears = event.target.getAttribute('data-expirience-years');
                const empName = event.target.getAttribute('data-emp-name');
                const empCategory = event.target.getAttribute('data-emp-cat');
                let accPlan = {};
                let docYears = {};
                let fDay = {};
                try{
                    accPlan = JSON.parse(accredPlan);   
                    accPlan = JSON.parse(documentYears);
                    accPlan = JSON.parse(finDay);
                }
                catch (error) {
                    console.error('Ошибка парсинга:', error);
                }
    
    
                document.getElementById('teacherNameModal').value = empName;
                document.getElementById('accreditationID').value = acredID;
                document.getElementById('employerIDmodal').value = empID;
                document.getElementById('currentYearModal').value = expYears;
                document.getElementById('currentCategoryModal').value = empCategory;
            }
        });
    
    });
    
    document.addEventListener("DOMContentLoaded", () => {
        const editBtns = document.querySelectorAll(".editEmployerBtn");
    
        editBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                // Извлечение данных из data-атрибутов
                const finishDay = JSON.parse(btn.getAttribute("data-finish-day"))
                const accreditationPlan = JSON.parse(btn.getAttribute("data-accreditation-plan"));
                const documentYears = JSON.parse(btn.getAttribute("data-document-years"));
                const experienceYears = btn.getAttribute("data-expirience-years");
    
                // Соответствие категорий и их идентификаторов
                const categoryMapping = {
                    "Спеціаліст": 1,
                    "Спеціаліст другої категорії": 2,
                    "Спеціаліст першої категорії": 3,
                    "Спеціаліст вищої категорії": 4,
                    "Підтвердження вищої категорії": 5,
                    "Підтвердження вищої категорії 2": 6
                };
    
                // Заполнение полей для каждой категории
                for (const [category, year] of Object.entries(accreditationPlan)) {
                    const categoryId = categoryMapping[category];
                    if (categoryId && year) {
                        document.getElementById(`accreditationYearModal${categoryId}`).value = year;
                        // document.getElementById(`categoryYearsModal${categoryId}`).value = experienceYears || 0;
                    }
                }
    
                // Сортируем годы и значения (по возрастанию годов)
                const sortedYears = Object.entries(documentYears)
    
                const docButtons = document.querySelectorAll('.docViewBtn');
                docButtons.forEach((btn, index) => {
                    if (sortedYears[index]) {
                        const [, documentID] = sortedYears[index];
                        btn.setAttribute('data-documentID', documentID);
                    } else {
                        btn.setAttribute('data-documentID', '');
                    }
                });
    
                for (const [category, year] of Object.entries(finishDay)) {
                    const categoryId = categoryMapping[category];
                    if (categoryId && year) {
                        document.getElementById(`accreditationDateModal${categoryId}`).value = year;
                    }
                }
    
                
    
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('EditAccreditationModal').addEventListener('click', event => {
            const button5 = event.target.closest('.docViewBtn');
            if (button5) {
                let docID5 = button5.getAttribute('data-documentID');
                window.open(`../../../app/models/GetData/getDocument.php?documentID=${docID5}`, '_blank');
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        const searchIcon = document.getElementById("searchIcon");
        const searchInput = document.getElementById("searchInput");
        const table = document.getElementById("documentTable"); 
    
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
    