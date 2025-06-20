<?php
$current_page = basename($_SERVER['PHP_SELF']); // Получаем текущий файл
?>

<div id="nav-bar">
    <input id="nav-toggle" type="checkbox"/>
    <div id="nav-header">
        <a id="nav-title" href="" target="_blank">StudHRM</a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr/>
    </div>
    <div id="nav-content">
        <a href="../dashboard/dashboard.php">
            <div class="nav-button <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                <i class="fas fi fi-sr-home"></i><span>Головна</span>
            </div>
        </a>

        <?php
        if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2)
        {
            echo "<a href=\"../EmpManagmentPanel/EmpManagTable.php\">
                    <div class=\"nav-button " . ($current_page == 'EmpManagTable.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-sr-mode-portrait\"></i><span>Персонал</span>
                    </div>
                  </a>";
        }
        ?>

        <?php
        if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2)
        {
            echo "<a href=\"../AccreditationManag/AccreditationManag.php\">
                    <div class=\"nav-button " . ($current_page == 'AccreditationManag.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-sr-graduation-cap\"></i><span>Атестація</span>
                    </div>
                  </a>";
        }
        ?>

        <?php
        if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2)
        {
            echo "<a href=\"../positionManag/positionManagPage.php\">
                    <div class=\"nav-button " . ($current_page == 'positionManagPage.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-sr-briefcase\"></i><span>Посади</span>
                    </div>
                  </a>";
        }
        ?>

<?php
        if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2)
        {
            echo "<a href=\"../CoursesManag/CoursesManag.php\">
                    <div class=\"nav-button " . ($current_page == 'CoursesManag.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-ss-book-circle-arrow-right\"></i><span>Курси</span>
                    </div>
                  </a>";
        }
        ?>

        
        <?php
        if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2)
        {
            echo "<a href=\"../documentManag/documentManagPage.php\">
                    <div class=\"nav-button " . ($current_page == 'documentManagPage.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-sr-duplicate\"></i><span>Документообіг</span>
                    </div>
                  </a>";
        }
        ?>

        <hr/>

        <a href="../personalPage/personalPage.php">
            <div class="nav-button <?php echo ($current_page == 'personalPage.php' ? 'active' : ''); ?>">
                <i class="fas fi fi-ss-user"></i><span>Мій кабінет</span>
            </div>
        </a>
        <hr/>

        <?php
        if($emp->getAccessLevelID() == 1)
        {
            echo "<a href=\"../AdminPanel/AdminPanel.php\">
                    <div class=\"nav-button " . ($current_page == 'AdminPanel.php' ? 'active' : '') . "\">
                        <i class=\"fas fi fi-br-admin\"></i><span>Адмін. панель</span>
                    </div>
                  </a>";
        }
        ?>
        
    </div>
    <input id="nav-footer-toggle" type="checkbox"/>
    <div id="nav-footer">
        <div id="nav-footer-heading">
            <div id="nav-footer-avatar">
                <img src="../../../Files/photos/<?php echo htmlspecialchars($emp->getAvatar(), ENT_QUOTES); ?>" 
                     alt="User Photo" class="rounded-circle">
            </div>
            <div id="nav-footer-titlebox">
                <a id="nav-footer-title" href="#" target="_blank"><?php echo htmlspecialchars($emp->getName(), ENT_QUOTES); ?></a>
                <span id="nav-footer-subtitle">
                <?php
                switch ($emp->getAccessLevelID()) {
                    case 1:
                        echo "Директор";
                        break;
                    case 2:
                        echo "HR-менеджер";
                        break;
                    case 3:
                        echo "Співробітник";
                        break;
                    default:
                        echo "Хто ти, воїн?...";
                        break;
                }
                ?>
                </span>
            </div>
            <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
        </div>
        <div id="nav-footer-content">
            <div class="profile-line">
                <div class="log-out">
                    <i class="fas fi fi-rr-exit"></i>
                    <span><a href="../../../TEST_FILES/logout.php">Вийти із системи...</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .active {
        background-color: #303030;
        color: white;
    }
</style>
