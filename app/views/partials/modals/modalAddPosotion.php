<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../models/UserVerify.php';
    require_once __DIR__ . '/../../../models/DashboardModel.php';
    require_once __DIR__ . '/../../../models/modals/deleteEndpoint.php';
    require_once __DIR__ . '/../../../models/modals/addPosition.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .modal-content {
            background: rgb(255, 255, 255); 
            border-radius: 36px;
            border: none;
            color: #303030;
        }
        .modal-header {
            border-radius: 36px 36px 0px 0px;
            border-bottom: none; 
            padding-bottom: 10px;
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .modal-title {
            flex-grow: 1;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #303030;
        }
        .btn-close {
            background: rgb(48, 48, 48); 
            border-radius: 50%;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }
        .btn-close:hover {
            opacity: 1;
        }
        .modal-body {
            padding: 20px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.6);
            border-radius: 36px;
            border: 1px solid rgba(48, 48, 48, 0.2);
            padding: 10px 15px;
            font-size: 14px;
            color: #303030;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #ffc825;
            outline: none;
        }
        .form-label {
            font-size: 14px;
            font-weight: 600;
            color: #303030;
        }
        .modal-footer .btn {
            background: rgba(255, 200, 37, 0.6);
            color: #303030;
            border-radius: 36px;
            padding: 10px 20px;
            font-weight: bold;
            font-size: 14px;
            border: none;
            transition: all 0.3s ease;
        }
        .modal-footer .btn:hover {
            background: rgba(255, 200, 37, 0.8);
        }

        img.rounded-circle {
            border: 3px solid #ffc825;
        }

        .table img.rounded-circle {
            border-radius: 50%;
            object-fit: cover;
        }

        header img {
            max-height: 50px;
        }


        .btn-cor {
            background: transparent; /* Изначально без фона */
            border: 2px solid transparent; /* Границы скрыты */
            border-radius: 36px;
            opacity: 0.6;
            transition: border-color 0.3s ease, opacity 0.3s ease;
            border-radius: 36px;
            padding: 10px 20px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-cor:hover {
            border-color: #303030; /* Границы появляются при наведении */
            background: transparent; /* Фон остаётся прозрачным */
            opacity: 1;
        }

        .file-attach{
            border-radius: 36px;
            background:rgba(255, 248, 218, 0.66);
            padding: 25px;
        }

        </style>

</head>
<body>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SalaryManagementModal">
        Open Salary Management
    </button>
    
    
    <div class="modal fade" id="SalaryManagementModal" tabindex="-1" aria-labelledby="salaryModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">Manage Employee Salary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="positionForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">Input a new posotion</label>
                                <input type="text" class="form-control" id="positionName" name="positionName" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="employeeSelect" class="form-label">positionLevel</label>
                                <input type="text" class="form-control" id="positionLevel" name="positionLevel">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currentSalary" class="form-label">Salary</label>
                                <input type="text" class="form-control" id="positionSalary" name="positionSalary" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="positionRequirements" class="form-label">Positions requirments</label>
                                <input type="text" class="form-control" id="positionRequirements" name="positionRequirements" required>
                            </div>
                            <div class="file-attach">
                                <div class="mb-3 col-md-12" >
                                    <label for="uploadPDF" class="form-label">Attach PDF Confirmation</label>
                                    <input type="file" class="form-control" id="uploadPDF" name="confirmationFile" accept=".pdf" required >
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="employeeSelect" class="form-label">Input a new name of doc</label>
                                        <input type="text" class="form-control" id="docName" name="docName" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="employeeSelect" class="form-label">sphere</label>
                                        <input type="text" class="form-control" id="sphere" name="sphere">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="currentSalary" class="form-label">purpose</label>
                                        <input type="text" class="form-control" id="purpose" name="purpose" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="positionRequirements" class="form-label">docType</label>
                                        <input type="text" class="form-control" id="docType" name="docType" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn-cor"  data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="positionForm">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById('positionForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    console.log("Submitting form data:");
    formData.forEach((value, key) => console.log(`${key}:`, value));

    fetch('../../../models/modals/addPosition.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Position added successfully!');
            document.getElementById('SalaryManagementModal').classList.remove('show');
            document.body.classList.remove('modal-open');
            document.querySelector('.modal-backdrop').remove(); // Убираем затемнение
        } else {
            alert(`Error: ${data.message}`);
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>
