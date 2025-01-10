<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    set_include_path(__DIR__ . '/../');

    require_once 'config/database.php'; 

    require_once 'app/models/Employer.php';
    require_once 'app/models/Position.php';
    require_once 'app/models/Vocations.php';
    require_once 'app/models/ContinuingEducation.php';
    require_once 'app/models/Order.php';
    require_once 'app/models/Document.php';
    require_once 'app/models/AccessLevel.php';
    require_once 'app/models/EmployerPositions.php';
    require_once 'app/models/Continuingeducationhistory.php';
    require_once 'app/models/EmploymentContracts.php';



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $emp = new Employer($connection);
        $emp->setEmail($email);
        $emp->setPassword($password);

        if($emp->verify($email, $password)){
            echo "User verified";
            $_SESSION['employer_ID'] = $emp->getEmployerID();
            header('Location: dashboard.php');
        } else {
            echo "User not verified";
        }


        $emp->Show();


        // if ($user && password_verify($password, $user['password'])) {
        //     $_SESSION['user_id'] = $user['id'];
        //     header('Location: dashboard.php');
        //     exit();
        // } else {
        //     $error = "Invalid email or password";
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
