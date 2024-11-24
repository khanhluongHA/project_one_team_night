<?php

class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $password)) {
                // Redirect or display success message
                header("Location: views/login/login.php");
                exit;
            } else {
                // Handle error
                echo "Registration failed.";
            }
        }

        include 'views/login/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                // Set session or perform login actions
                $_SESSION['user'] = $user;
                header("Location: views/login/login.php");
                exit;
            } else {
                // Handle login error
                echo "Invalid credentials.";
            }
        }

        include 'views/login/login.php';
    }
}
?>