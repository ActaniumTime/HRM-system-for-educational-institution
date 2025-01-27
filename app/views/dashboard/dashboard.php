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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-wrapper">
        <?php require_once __DIR__ . "../../partials/sideBar.php"; ?>
        <div class="content-wrapper">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="../../../Files/photos/<?php echo $emp->getAvatar(); ?>" alt="User Photo" class="rounded-circle" width="150" height="150">
                        <h2>Welcome, <?php echo $emp->getName(); ?></h2>
                        <p>This is a protected page.</p>
                        <a href="../../../TEST_FILES/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
                <!-- Основной контент -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Schedule</h5>
                                <p class="card-text">View and manage your schedule.</p>
                                <a href="schedule.php" class="btn btn-primary">Go to Schedule</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Notifications</h5>
                                <p class="card-text">Manage your notifications.</p>
                                <a href="notifications.php" class="btn btn-primary">Manage Notifications</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User Profile</h5>
                                <p class="card-text">View and edit your profile.</p>
                                <a href="profile.php" class="btn btn-primary">Go to Profile</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Personnel Management</h5>
                                <p class="card-text">Manage personnel records.</p>
                                <a href="../EmpManagmentPanel/EmpManagTable.php" class="btn btn-primary">Manage Personnel</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Notifications Feed</h5>
                                <p class="card-text">View recent notifications.</p>
                                <a href="notifications_feed.php" class="btn btn-primary">View Notifications</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Announcements Feed</h5>
                                <p class="card-text">View recent announcements.</p>
                                <a href="announcements_feed.php" class="btn btn-primary">View Announcements</a>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.1/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

