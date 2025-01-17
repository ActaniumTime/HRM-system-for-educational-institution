document.addEventListener('DOMContentLoaded', () => {
    const updatedForm = document.getElementById('employerForm');
    const downloadJsonButton = document.getElementById('downloadJson');

    let jsonData = {}; // Переменная для хранения JSON

    updatedForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(updatedForm);
        jsonData = {}; 

        formData.forEach((value, key) => {
            if (key === "dateFired" && value === "") {
                jsonData[key] = null;
            } else {
                jsonData[key] = value;
            }
        });

        fetch('../../../app/models/DashboardModel.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData) 
        })
        .then(response => response.text())
        .then(result => {
            console.log(result.success);
            // if (result.success === "true" || result.success === true) {
            //     console.log("true");
            // } else 
            // {
            //     console.log("false JS FILE");
            // }
        });

        console.log(JSON.stringify(jsonData));
        alert('JSON has been generated. Click "Download JSON" to download.');
    });

    downloadJsonButton.addEventListener('click', () => {
        if (Object.keys(jsonData).length === 0) {
            alert('Please submit the form first to generate JSON.');
            return;
        }

        const jsonBlob = new Blob([JSON.stringify(jsonData, null, 2)], { type: 'application/json' });

        const downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(jsonBlob);
        downloadLink.download = 'employer_data.json';

        downloadLink.click();

        URL.revokeObjectURL(downloadLink.href);
    });
});
