<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../../../app/models/UserVerify.php';

?>
<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header">
    <a id="nav-title" href="https://codepen.io" target="_blank">StudHRM</a>
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button"><i class="fas fa-palette"></i><span>Your Work</span></div>
    <div class="nav-button"><i class="fas fa-images"></i><span>Assets</span></div>
    <div class="nav-button"><i class="fas fa-thumbtack"></i><span>Pinned Items</span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-heart"></i><span>Following</span></div>
    <div class="nav-button"><i class="fas fa-chart-line"></i><span>Trending</span></div>
    <div class="nav-button"><i class="fas fa-fire"></i><span>Challenges</span></div>
    <div class="nav-button"><i class="fas fa-magic"></i><span>Spark</span></div>
    <hr/>
    <div class="nav-button"><i class="fas fa-gem"></i><span>Codepen Pro</span></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar">
        <img src="../../../Files/photos/<?php echo $emp->getAvatar(); ?>" alt="User Photo" class="rounded-circle" >
      </div>
      <div id="nav-footer-titlebox">
        <a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank"><?php echo $emp->getName();?></a>
        <span id="nav-footer-subtitle">
        <?php 
        switch($emp->getAccessLevelID()){
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
