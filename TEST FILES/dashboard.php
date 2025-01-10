<?php

require_once 'config/database.php';
require_once 'app/models/Employer.php';


if (isset($_COOKIE['employer_ID']) && !isset($_SESSION['employer_ID'])) {
    $_SESSION['employer_ID'] = $_COOKIE['employer_ID'];
}

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in. Redirecting to login page...";
    header('Location: login.php');
    exit();
}


$emp = new Employer($connection);
$emp->loadByID($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $emp->getName(); ?></h2>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
