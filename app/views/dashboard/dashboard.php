<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../../app/models/UserVerify.php';

if ($emp->getAccessLevelID() === 3) {
    header("Location: ../personalPage/personalPage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle.css">
    <link rel="stylesheet" href="../../../public/css/sidebarStyle2.css">

    <link rel="stylesheet" href="../../../public/css/hints.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-wrapper">
        <?php require_once __DIR__ . "../../partials/sideBar.php"; ?>
        <div class="content-wrapper">
            <div class="layout-container">

                <div class="temp-line">
                    <div class="tile">
                        <i class="fi fi-sr-graduation-cap" style="font-size: 3rem; color: #ffc825;"></i>
                        <h3>Підвищення кваліфікації</h3>
                        <p>Сторінка для керування аттестаціями співробітників.</p>
                        <a href="../AccreditationManag/AccreditationManag.php"><button>Відкрити</button></a>
                    </div>
                    <?php
                    switch ($emp->getAccessLevelID()) {
                        case 1 : case 2 :
                            echo "

                                <div class=\"tile\">
                                    <i class=\"fas fi fi-sr-duplicate\" style=\"font-size: 3rem; color: #303030;\"></i>
                                    <h3>Документообіг</h3>
                                    <p>Сторінка для керування усіма документами у системі.</p>
                                    <a href=\"../documentManag/documentManagPage.php\"><button>Відкрити</button></a>
                                </div>

                                <div class=\"tile\">
                                    <i class=\"fi fi-sr-briefcase\" style=\"font-size: 3rem; color: #303030;\"></i>
                                    <h3>Посади</h3>
                                    <p>Сторінка для керування позиціями у закладі.</p>
                                    <a href=\"../positionManag/positionManagPage.php\"><button>Відкрити</button></a>
                                </div>

                                <div class=\"tile\">
                                    <i class=\"fas fi fi-ss-book-circle-arrow-right\" style=\"font-size: 3rem; color: #303030;\"></i>
                                    <h3>Курси та стажування</h3>
                                    <p>Керування додатковими курсами та стажуванням співробітників.</p>
                                    <a href=\"../CoursesManag/CoursesManag.php\"><button>Відкрити</button></a>
                                </div>
                            ";
                        default:
                            break;
                    }
                    ?>

                    <?php
                    switch ($emp->getAccessLevelID()) {
                        case 1 : case 2 :
                            echo "
                                <div class=\"tile\">
                                    <i class=\"fas fi fi-sr-mode-portrait\" style=\"font-size: 3rem; color: #2e2e2e;\"></i>
                                    <h5 class=\"card-title\">Керування персоналом</h5>
                                    <p>Керування записами співробітників.</p>
                                    <a href=\"../EmpManagmentPanel/EmpManagTable.php\"><button>Відкрити</button></a>
                                </div>
                            ";
                        default:
                            break;
                    }
                    ?>
                    

                    <div class="tile">
                        <h5>Доброго дня, <?php echo htmlspecialchars($emp->getName(), ENT_QUOTES); ?></h5>
                        <img src="../../../Files/photos/<?php echo $emp->getAvatar(); ?>" alt="User Photo" class="rounded-circle" width="100" height="100">
                        <p>Рівень: 
                            <?php
                            switch ($emp->getAccessLevelID()) {
                                case 1: echo "Директор"; break;
                                case 2: echo "HR-менеджер"; break;
                                case 3: echo "Співробітник"; break;
                                default: echo "Хто ти, воїн?..."; break;
                            }
                            ?>
                        </p>
                        <a href="../personalPage/personalPage.php"><button>Відкрити</button></a>
                    </div>

                    <?php 
                        switch ($emp->getAccessLevelID()) {
                            case 1 :
                                echo "
                                    <div class=\"tile\">
                                        <i class=\"fas fi fi-br-admin\" style=\"font-size: 3rem; color: #2e2e2e;\"></i>
                                        <h5 class=\"card-title\">Панель адміністратору</h5>
                                        <p>Керування рівнем доступу користувачів, архівування даних та файлів системи.</p>
                                        <a href=\"../AdminPanel/AdminPanel.php\"><button>Відкрити</button></a>
                                    </div>
                                ";
                            default:
                                break;
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.1/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>
        const navToggle = document.getElementById('nav-toggle');
        const contentWrapper = document.querySelector('.content-wrapper');

        navToggle.addEventListener('change', () => {
            if (navToggle.checked) {
                contentWrapper.style.marginLeft = `calc(var(--navbar-width-min) + 1rem)`;
            } else {
                contentWrapper.style.marginLeft = `calc(var(--navbar-width) + 1rem)`;
            }
        });

    </script>
