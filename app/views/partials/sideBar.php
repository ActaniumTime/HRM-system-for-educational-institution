<div id="nav-bar">
    <input id="nav-toggle" type="checkbox"/>
    <div id="nav-header">
        <a id="nav-title" href="https://codepen.io" target="_blank">StudHRM</a>
        <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
        <hr/>
    </div>
    <div id="nav-content">
        <div class="nav-button"><i class="fas fi fi-sr-home"></i><span>Головна</span></div>

        <?php
            if($emp->getAccessLevelID() == 1 || $emp->getAccessLevelID() == 2 || $emp->getAccessLevelID() == 3)
            {
                echo "<div class=\"nav-button\"><i class=\"fas fi fi-sr-mode-portrait\"></i><span>Управління</span></div>";
            }
        ?>

        
        <div class="nav-button"><i class="fas fi fi-ss-book-circle-arrow-right"></i><span>Курси</span></div>
        <div class="nav-button"><i class="fas fi fi-sr-duplicate"></i><span>Документи </span></div>
        <hr/>

        
        <div class="nav-button"><i class="fas fa-fire"></i><span>Завдачі</span></div>
        <div class="nav-button"><i class="fas fa-magic"></i><span>Заглушка</span></div>
        <div class="nav-button"><i class="fas fi fi-ss-user"></i><span>Мій кабінет</span></div>
        <hr/>

        <?php
            if($emp->getAccessLevelID() == 1)
            {
                echo "<div class=\"nav-button\"><i class=\"fas fi fi-br-admin\"></i><span>Адмін. панель</span></div>";
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
            <div class="profile-line">
                <div class="log-out">
                    <i class="fas fi fi-rr-exit"></i>
                    <span><a href="../../../TEST_FILES/logout.php">Logout</a></span>
                </div>

            </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam pariatur quos sit, voluptate ab quam vero nisi quis distinctio ipsam officia quisquam!
        </div>
    </div>
</div>
