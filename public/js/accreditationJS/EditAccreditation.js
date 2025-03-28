document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('EditAccreditationForm');
    const modal = document.getElementById('EditAccreditationModal'); // Если используешь Bootstrap-модалку

    document.getElementById('saveAccreditation').addEventListener('click', async (event) => {
        event.preventDefault();

        const accreditationID = form.querySelector('#accreditationID')?.value || null;
        const employerID = form.querySelector('#employerIDmodal')?.value || null;
        const teacherName = form.querySelector('#teacherNameModal')?.value || null;
        const currentCategory = form.querySelector('#currentCategoryModal')?.value || null;
        const currentYear = parseInt(form.querySelector('#currentYearModal')?.value) || 0;

        if (!employerID) {
            alert('Ошибка: отсутствует employerID');
            return;
        }

        const categories = [];
        const files = [];

        for (let i = 1; i <= 5; i++) {
            const year = form.querySelector(`#accreditationYearModal${i}`)?.value || null;
            const date = form.querySelector(`#accreditationDateModal${i}`)?.value || null;
            const docID = form.querySelector(`#collapse${i} .editEmployerBtn[data-documentID]`)?.getAttribute('data-documentID') || null;
            const docName = form.querySelector(`#docNameModal${i}`)?.value || null;
            const sphere = form.querySelector(`#sphereModal${i}`)?.value || null;
            const purpose = form.querySelector(`#purposeModal${i}`)?.value || null;
            const docType = form.querySelector(`#docTypeModal${i}`)?.value || null;
            const fileInput = form.querySelector(`#uploadPDFModal${i}`);
            const file = fileInput?.files.length > 0 ? fileInput.files[0] : null;

            if (year || date || docID || docName || sphere || purpose || docType || file) {
                categories.push({ index: i, year, date, docID, docName, sphere, purpose, docType });
                if (file) files.push({ index: i, file });
            }
        }

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

        const formData = new FormData();
        formData.append('accreditationID', accreditationID);
        formData.append('employerID', employerID);
        formData.append('teacherName', teacherName);
        formData.append('currentCategory', currentCategory);
        formData.append('currentYear', currentYear);
        formData.append('accreditationPlan', JSON.stringify(accreditationPlan));
        formData.append('documentYears', JSON.stringify(documentYears));
        formData.append('finishDay', JSON.stringify(finishDay));
        formData.append('categories', JSON.stringify(categories));

        files.forEach(({ index, file }) => {
            formData.append(`file_${index}`, file);
            formData.append(`docName_${index}`, categories[index - 1].docName || 'Без названия');
            formData.append(`sphere_${index}`, categories[index - 1].sphere || '');
            formData.append(`purpose_${index}`, categories[index - 1].purpose || '');
            formData.append(`docType_${index}`, categories[index - 1].docType || 'Прочее');
        });

        console.log('Отправляемые данные:', formData);

        try {
            const response = await fetch('../../../app/models/modals/EditAccreditation.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`Ошибка: ${response.statusText}`);
            }

            const result = await response.json();
            console.log('Ответ от EditAccreditation.php:', result);

            if (result.status !== 'success') {
                throw new Error(`Ошибка сохранения: ${result.message}`);
            }

            alert('Аккредитация и документы успешно сохранены!');
            location.reload();
        } catch (error) {
            console.error('Ошибка при сохранении аккредитации:', error);
            alert('Ошибка при сохранении. Подробности в консоли.');
        }
    });

    function clearForm() {
        form.reset();
        document.querySelectorAll('#EditAccreditationForm input, #EditAccreditationForm select').forEach(input => {
            if (input.type !== 'hidden') input.value = '';
        });
    }

    if (modal) {
        modal.addEventListener('hidden.bs.modal', clearForm);
    }

    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
        button.addEventListener('click', clearForm);
    });
});
