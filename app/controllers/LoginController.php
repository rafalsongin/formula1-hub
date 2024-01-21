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
        } else {
            http_response_code(404);
        }
    }

    public function openLoginPage() {
        include '../views/LoginView.php';
    }
    
    public function openRegistrationPage() {
        include '../views/RegisterView.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $input_password = $_POST['password'] ?? '';
        
        if ($this->loginService->authenticateUser($username, $input_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            header('Location: /');
        } else {
            
            header('Location: /login');
        }
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($this->loginService->registerUser($username, $password, $email)) {
            include_once '../views/RegistrationSuccessful.php';
        } else {
            // TODO: redirect to "registration failed" page if f.e. username already exists
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
