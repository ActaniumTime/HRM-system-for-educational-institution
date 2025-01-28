<div id="nav-bar">
    <input id="nav-toggle" type="checkbox"/>
    <div id="nav-header">
        <a id="nav-title" href="https://codepen.io" target="_blank">StudHRM</a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr/>
    </div>
    <div id="nav-content">
        <div class="nav-button"><i class="fas fa-palette"></i><span>Дошка управління</span></div>
        <div class="nav-button"><i class="fas fa-images"></i><span>Курси</span></div>
        <div class="nav-button"><i class="fas fa-thumbtack"></i><span>Закріпленні </span></div>
        <hr/>
        <div class="nav-button"><i class="fas fa-heart"></i><span>Відстежувати</span></div>
        <div class="nav-button"><i class="fas fa-chart-line"></i><span>Активні</span></div>
        <div class="nav-button"><i class="fas fa-fire"></i><span>Завдачі</span></div>
        <div class="nav-button"><i class="fas fa-magic"></i><span>Заглушка</span></div>
        <hr/>
        <div class="nav-button"><i class="fas fa-gem"></i><span>Налаштування системи</span></div>
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
                </span>
            </div>
            <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
        </div>
        <div id="nav-footer-content">
            <a href="../../../TEST_FILES/logout.php">Logout</a>
        </div>
    </div>
</div>
