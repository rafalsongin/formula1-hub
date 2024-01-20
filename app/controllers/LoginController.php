<?php
require_once '../services/LoginService.php';
require_once '../config/init.php';


class LoginController {
    private LoginService $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }
    
    public function registerEndpoint() {
        if (isset($_POST['register'])) {
            $this->register();
        } else if (isset($_POST['login'])) {
            $this->login();
        } else if (isset($_POST['logout'])) {
            $this->logout();
        }

        header('Location: /');
    }

    public function openLoginPage() {
        include '../views/LoginView.php';
    }

    public function openRegisterPage() {
        include '../views/RegisterView.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($this->loginService->authenticateUser($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
        } else {
            echo "Invalid credentials";
        }
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        if (!$this->loginService->registerUser($username, $password, $email)) {
            error_log("User not registered: " . $username(), 3, "/logfile.log");
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}
