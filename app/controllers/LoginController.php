<?php
require_once '../services/LoginService.php';
require_once '../config/init.php';


class LoginController {
    private LoginService $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }
    
    public function authEndpoint() {
        if (isset($_POST['register'])) {
            $this->register();
        } else if (isset($_POST['login'])) {
            $this->login();
        } else if (isset($_POST['logout'])) {
            $this->logout();
        }

        // header('Location: /');
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
//            session_regenerate_id(); // Regenerate session ID

            header('Location: /');
        } else {
            
            header('Location: /login');
        }
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        if (!$this->loginService->registerUser($username, $password, $email)) {
            // success
            // TODO: redirect to "successful registration" page
        } else {
            // error
            // TODO: redirect to "registration failed" page
        }
    }

    public function logout() {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to homepage or login page
        header('Location: /');
    }
}
