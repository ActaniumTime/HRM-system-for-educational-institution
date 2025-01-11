<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// set_include_path(__DIR__ . '/../../');

require_once 'config/database.php';
require_once 'app/models/Employer.php';

class LoginController {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $employer = new Employer($this->connection);
            if ($employer->verify($email, $password)) {
                $_SESSION['employer_ID'] = $employer->getEmployerID();
                header('Location: ./app/views/dashboard/dashboard.php');
                exit;
            } else {
                $error = "Invalid email or password.";
                require_once 'app/views/auth/login.php';
            }
        } else {
            require_once 'app/views/auth/login.php';
        }
    }
}

?>