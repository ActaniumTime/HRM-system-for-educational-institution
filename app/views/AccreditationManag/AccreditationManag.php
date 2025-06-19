<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../../../app/models/UserVerify.php';
    require_once __DIR__ . '/../../../app/models/classes/Accreditation.php';
    require_once __DIR__ . '/../../../app/models/modals/deleteEndpoint.php';
    require_once __DIR__ . '../../partials/modals/modalAddEmp.php';
    require_once __DIR__ . '../../partials/AccreditationManagPartial/modalEditAccreditation.php';
    require_once __DIR__ . "../../partials/AccreditationManagPartial/AccreditationWillAchive.php";
    require_once __DIR__ . "../../partials/SuccessModals/SuccessUpdateAccred.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Керування атестацією</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle2.css">
    <link rel="stylesheet" href="../../../public/css/addEmpModalStyles.css">
    <link rel="stylesheet" href="../../../public/css/hints.css">
    <link rel="stylesheet" href="../../../public/css/SuccessModal.css">
    <link rel="stylesheet" href="AccredStyle.css">
</head>
<body>


<div class="page-wrapper">
<?php  
    require_once __DIR__ . "../../partials/sideBar.php";
?>

    <div class="content-wrapper">
        <div class="layout-container">
            
            <div class="temp-line" style="grid-template-columns: 1fr 1fr auto; margin-top: -10px; margin-bottom: -14px;">

                    <div  class="tool-bar-element filters-2">
                        <?php  
                            require_once __DIR__ . "/../partials/AccreditationManagPartial/FiltersMenu2.php";
                        ?>
                    </div>

                    <div class="tool-bar-element search-container-u">
                        <?php
                            require_once __DIR__ . "/../partials/EmpManagPartial/searchBar.php";
                        ?>
                    </div>
            </div>


            <div class="temp-line">
                <div class="summary">
                    <?php require_once __DIR__ . "../../partials/AccreditationManagPartial/AccreditationPlan.php"; ?>
                </div>
                
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../../public/js/accreditationJS/DataAccreditationTable.js"></script>

<script src="../../../public/js/accreditationJS/EditAccreditation.js"></script>

<script src="../../../public/js/accreditationJS/tableSearching.js"></script>

<script src="../../../public/js/tooltip.js"></script>

<script src="../../../public/js/tableSearching.js"></script>

<script src="../../../public/js/tableEmpFilters.js"></script>

<script src="../../../public/js/ModalStat/empManagStat.js"></script>

<script src="../../../public/js/navBar.js"></script>

</body>
</html>

<div class="modal fade" id="FAQAccreditationModal" tabindex="-1" aria-labelledby="FAQAccreditationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FAQAccreditationModalLabel">FAQ — Система атестації</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6><strong>Особливості логіки збереження та додавання документів до системи</strong></h6>
                        <p>
                            Система зберігання документів працює за логікою <strong>стека</strong>. Кожна нова категорія (наприклад, вища) передбачає, що сертифікати за попередні категорії вже додані.
                        </p>
                        <p>
                            Якщо додати сертифікат одразу за вищу категорію, минуючи проміжні — система не зможе коректно витягнути відповідний номер документа, оскільки стек передбачає послідовне додавання згори вниз.
                        </p>

                        <h6><strong>Порядок дій:</strong></h6>
                        <ol>
                            <li>Перед додаванням сертифіката перевірте наявність документів за попередні категорії.</li>
                            <li>У разі відсутності — спочатку додайте їх. Інакше стекова логіка буде порушена.</li>
                            <li>Якщо додано неправильний або недійсний документ — завантажте новий. Система перезапише старий номер.</li>
                        </ol>

                        <div class="alert alert-warning mt-3">
                            <strong>Увага:</strong> порушення порядку додавання категорій може призвести до некоректного виведення даних у звітах.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                            Офіційне пояснення логіки збереження
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>
                                Система збереження та обробки документів функціонує за принципом стеку (структури типу "останній прийшов — перший вийшов"). Зокрема, у випадку, коли працівник має чинну категорію (наприклад, першу) та нещодавно пройшов атестацію на вищу категорію, що передбачає отримання відповідного сертифіката, останній необхідно внести до системи через спеціальне модальне вікно.
                            </p>
                            <p>
                                У даному вікні документ додається відповідно до тієї категорії, яку він підтверджує. Водночас важливо врахувати, що в разі відсутності завантажених сертифікатів за попередні (нижчі) категорії — система може функціонувати некоректно. Це зумовлено тим, що механізм збереження номерів документів реалізовано на основі стеку: при зверненні до певної категорії відбувається пошук відповідного запису у зворотному порядку (від вищої до нижчої).
                            </p>
                            <p>
                                У зв’язку з цим <strong>наполегливо рекомендується</strong> перед додаванням сертифікатів за вищі категорії переконатися у наявності внесених документів за всі попередні рівні. За їх відсутності слід завантажити відповідні сертифікати, щоб забезпечити коректне функціонування системи.
                            </p>
                            <p>
                                У разі помилкового завантаження невірного файлу або недійсного документа — можливе повторне додавання правильного файлу. При цьому система перезапише збережений номер документа, оновивши відповідний запис.
                            </p>
                        </div>
                    </div>
                </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                Чи можливо оновити лише дату/рік документа без повторного завантаження файлу?
                            </button>
                        </h2>
                        <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Частково. У випадку уточнення точної дати проведення атестації — файл не буде потрібно повторно завантажувати.
                                <p>
                                    Але, якщо буде змінено рік проведення атестації — файл все ж потрібно буде повторно завантажити.
                                </p>
                                <p>
                                    На жаль, система не передбачає можливості оновлення року документа без повторного завантаження файлу.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>

