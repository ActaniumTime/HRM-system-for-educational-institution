<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../../app/models/UserVerify.php';
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
                <div class="tile interviews">
                    <h3>Interviews</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 70%;"></div>
                    </div>
                    <span>70%</span>
                </div>
                <div class="tile hired">
                    <h3>Hired</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 10%;"></div>
                    </div>
                    <span>10%</span>
                </div>
                <div class="tile project-time">
                    <h3>Project Time</h3>
                    <div class="progress-bar striped">
                        <div class="progress" style="width: 15%;"></div>
                    </div>
                    <span>15%</span>
                </div>
                <div class="tile output">
                    <h3>Output</h3>
                    <div class="progress-bar">
                        <div class="progress" style="width: 5%;"></div>
                    </div>
                    <span>5%</span>
                </div>
                <div class="summary">
                    <div>
                        <span>91</span>
                        <p>Employee</p>
                    </div>
                    <div>
                        <span>104</span>
                        <p>Hirings</p>
                    </div>
                    <div>
                        <span>185</span>
                        <p>Projects</p>
                    </div>
                </div>
            </div>





            <div class="temp-line">
                <div class="tile">
                    <h3>Управління акредитацією</h3>
                    <p>сторінка для керування акредаціями співроботників</p>
                    <a href="../AccreditationManag/AccreditationManag.php"><button>Відкрити</button></a>
                </div>
                <div class="tile">
                    <h3>Управління документами</h3>
                    <p>сторінка для керування усіми документами у системі</p>
                    <a href="../documentManag/documentManagPage.php"><button>Відкрити</button></a>
                </div>
                <div class="tile">
                    <h3>Управління позиціями</h3>
                    <p>сторінка для керування позиціями у закладі</p>
                    <a href="../positionManag/positionManagPage.php"><button>Відкрити</button></a>
                </div>
                <div class="tile">
                    <h3>Tasks</h3>
                    <p>Manage your tasks effectively and increase productivity.</p>
                    <button>Open</button>
                </div>

                <?php
                    switch ($emp->getAccessLevelID()) {
                        case 1 : case 2 :
                            echo "
                                <div class=\"tile\">
                                    <h5 class=\"card-title\">Керування персоналом</h5>
                                    <p class=\"card-text\">Тут будуть якись записи.</p>
                                    <a href=\"../EmpManagmentPanel/EmpManagTable.php\" class=\"btn btn-primary\">Керування персоналом</a>
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
                        case 1:
                            echo "Admin";
                            break;
                        case 2:
                            echo "Manager";
                            break;
                        case 3:
                            echo "Employee";
                            break;
                        default:
                            echo "Unknown";
                            break;
                    }
                    ?>
                    </p>
                    <p><a href="#"><button style="width: 150px; height:30px;">До кабінету</button></a></p>
                </div>
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
