document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('saveAccreditation').addEventListener('click', async (event) => {
        event.preventDefault();

        const form = document.getElementById('EditAccreditationForm');

        // Шаг 1: Сбор данных из модального окна
        const accreditationID = form.querySelector('#accreditationID').value || null;
        const employerID = form.querySelector('#employerIDmodal').value || null;
        const teacherName = form.querySelector('#teacherNameModal').value || null;
        const currentCategory = form.querySelector('#currentCategoryModal').value || null;
        const currentYear = parseInt(form.querySelector('#currentYearModal').value) || 0;

        // Проверяем обязательные поля
        if (!employerID) {
            alert('Ошибка: отсутствует employerID');
            return;
        }

        // Шаг 2: Сбор данных по категориям
        const categories = [];
        const files = [];

        for (let i = 1; i <= 5; i++) {
            const year = form.querySelector(`#accreditationYearModal${i}`)?.value || null;
            const date = form.querySelector(`#accreditationDateModal${i}`)?.value || null;
            const docID = form.querySelector(`#collapseOne .editEmployerBtn[data-documentID]`)?.getAttribute('data-documentID') || null;
            const docName = form.querySelector(`#docNameModal${i}`)?.value || null;
            const sphere = form.querySelector(`#sphereModal${i}`)?.value || null;
            const purpose = form.querySelector(`#purposeModal${i}`)?.value || null;
            const docType = form.querySelector(`#docTypeModal${i}`)?.value || null;
            const fileInput = form.querySelector(`#uploadPDFModal${i}`);
            const file = fileInput?.files.length > 0 ? fileInput.files[0] : null;

            if (year || date || docID || docName || sphere || purpose || docType || file) {
                categories.push({ year, date, docID, docName, sphere, purpose, docType });
                if (file) files.push({ index: i, file });
            }
        }

        // Шаг 3: Формирование структуры данных
        const accreditationPlan = {};
        const documentYears = {};
        const finishDay = {};

        categories.forEach((category, index) => {
            const categoryNames = [
                'Спеціаліст',
                'Спеціаліст другої категорії',
                'Спеціаліст першої категорії',
                'Спеціаліст вищої категорії',
                'Підтвердження вищої категорії'
            ];
            if (category.year) {
                accreditationPlan[categoryNames[index]] = parseInt(category.year);
                documentYears[category.year] = category.docID || null;
                finishDay[categoryNames[index]] = category.date || '';
            }
        });

        // Шаг 4: Создание JSON-объекта
        const payload = {
            accreditationID,
            employerID,
            teacherName,
            currentCategory,
            currentYear,
            accreditationPlan,
            documentYears,
            finishDay,
            categories
        };

        console.log('Payload JSON:', payload);

        try {
            // Шаг 5: Отправка JSON-данных
            const jsonResponse = await fetch('../../../app/models/modals/EditAccreditation.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            if (!jsonResponse.ok) {
                throw new Error(`Ошибка: ${jsonResponse.statusText}`);
            }

            const result = await jsonResponse.json();

            if (files.length > 0) {
                const fileData = new FormData();
                fileData.append('accreditationID', result.accreditationID);
                fileData.append('ownerID', employerID); 
            
                files.forEach(({ index, file }) => {
                    fileData.append(`file_${index}`, file);
                    fileData.append(`docName_${index}`, categories[index - 1].docName || 'Без названия');
                    fileData.append(`sphere_${index}`, categories[index - 1].sphere || '');
                    fileData.append(`purpose_${index}`, categories[index - 1].purpose || '');
                    fileData.append(`docType_${index}`, categories[index - 1].docType || 'Прочее');
                });
            
                console.log('Отправляемые файлы:', fileData);
            
                const fileResponse = await fetch('../../../app/models/modals/UploadAccreditationFiles.php', {
                    method: 'POST',
                    body: fileData
                });
            
                if (!fileResponse.ok) {
                    throw new Error(`Ошибка загрузки файлов: ${fileResponse.statusText}`);
                }
            
                const fileResult = await fileResponse.json();
                console.log('Ответ сервера после загрузки файлов:', fileResult);
            
                if (fileResult.status !== 'success') {
                    throw new Error('Ошибка при добавлении документов в БД.');
                }
            
                alert('Аккредитация и документы успешно сохранены!');
                location.reload();
            }
            


            alert('Аккредитация успешно сохранена!');
            document.getElementById('EditAccreditationModal').modal('hide');
        } catch (error) {
            console.error('Ошибка при сохранении аккредитации:', error);
            alert('Ошибка при сохранении. Проверьте консоль для деталей.');
        }
    });
});
