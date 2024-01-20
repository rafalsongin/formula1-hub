<?php
require_once '../config/init.php';

class SwitchRouter
{
    public function route()
    {
        // Get the path portion of the URL
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove the leading slash
        $uri = ltrim($uri, '/');

        switch ($uri) {
            case '':
                require_once __DIR__ . '/HomeController.php';
                $controller = new \HomeController();
                $controller->index();
                break;
            case 'drivers':
                require_once __DIR__ . '/DriverController.php';
                $controller = new \DriverController();
                $this->loggedInUserCheck();
                $controller->index();
                break;
            case 'races':
                require_once __DIR__ . '/RaceController.php';
                $controller = new \RaceController();
                $controller->index();
                break;
            case 'login':
                require_once __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->openLoginPage();
                break;
            case 'register':
                require_once __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->openRegisterPage();
                break;
            case 'auth-endpoint':
                require_once __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->authEndpoint();
                break;
            case 'logout':
                require_once __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->logout();
                break;
            case 'test':
                include '../public/test.php';
                break;
            default:
                http_response_code(404);
                break;
        }
    }
    
    private function loggedInUserCheck() {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: /login');
        }
    }
}
