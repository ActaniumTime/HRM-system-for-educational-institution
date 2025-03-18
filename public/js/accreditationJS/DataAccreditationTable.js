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
            document.getElementById('currentYearModal').value = expYears;



            


            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;
            // document.getElementById('').value = empID;

            
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
                "Спеціаліст вищої категорії": 4
            };

            // Заполнение полей для каждой категории
            for (const [category, year] of Object.entries(accreditationPlan)) {
                const categoryId = categoryMapping[category];
                if (categoryId && year) {
                    document.getElementById(`accreditationYearModal${categoryId}`).value = year;
                    document.getElementById(`categoryYearsModal${categoryId}`).value = experienceYears || 0;
                }
            }

            // Заполнение годов документов
            Object.keys(documentYears).forEach((year, index) => {
                const docInput = document.getElementById(`docNameModal${index + 1}`);
                if (docInput && year) {
                    docInput.value = `Документ за ${year} рік`;
                }
            });

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

