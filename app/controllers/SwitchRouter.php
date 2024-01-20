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
                require __DIR__ . '/HomeController.php';
                $controller = new \HomeController();
                $controller->index();
                break;
            case 'drivers':
                require __DIR__ . '/DriverController.php';
                $controller = new \DriverController();
                $controller->index();
                break;
            case 'races':
                require __DIR__ . '/RaceController.php';
                $controller = new \RaceController();
                $controller->index();
                break;
            case 'login':
                require __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->openLoginPage();
                break;
            case 'register':
                require __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->openRegisterPage();
                break;
            case 'register-endpoint':
                require __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->registerEndpoint();
                break;
            case 'logout':
                require __DIR__ . '/LoginController.php';
                $controller = new \LoginController();
                $controller->logout();
                break;
            case 'registration-failed':
                include __DIR__ . '/../views/RegistrationFailed.html';
                break;
            default:
                echo '404 not found';
                http_response_code(404);
                break;
        }
    }
}
