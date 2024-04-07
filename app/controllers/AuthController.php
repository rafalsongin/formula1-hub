<?php

use App\Services\AuthService;

require_once '../config/init.php';
require_once '../services/AuthService.php';


class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /* public function authEndpoint()
    {
        if (isset($_POST['register'])) {
            $this->registerAuth();
        } else if (isset($_POST['login'])) {
            $this->loginAuth();
        } else if (isset($_POST['logout'])) {
            $this->logoutAuth();
        } else {
            http_response_code(404);
        }
    } */

    public function login()
    {
        include '../views/LoginView.php';
    }

    public function register()
    {
        include '../views/RegisterView.php';
    }

    public function loginAuth()
    {
        $username = $_POST['username'] ?? '';
        $input_password = $_POST['password'] ?? '';

        $username = strtolower($username);

        if ($this->authService->authenticateUser($username, $input_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            header('Location: /');
        } else {

            header('Location: /login');
        }
    }

    public function registerAuth()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($this->authService->registerUser($username, $password, $email)) {
            include_once '../views/RegistrationSuccessful.php';
        } else {
            include_once '../views/RegistrationFailed.php';
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: /');
    }
}
