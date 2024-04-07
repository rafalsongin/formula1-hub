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
                new \HomeController();
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
                $this->loggedInUserCheck();
                $controller->index();
                break;
            case 'comments':
                require_once __DIR__ . '/CommentsController.php';
                $controller = new \CommentsController();
                $this->loggedInUserCheck();
                $controller->showComments();
                break;
            case 'login':
                require_once __DIR__ . '/AuthController.php';
                $controller = new \AuthController();
                $controller->openLoginPage();
                break;
            case 'register':
                require_once __DIR__ . '/AuthController.php';
                $controller = new \AuthController();
                $controller->openRegistrationPage();
                break;
            case 'logout':
                require_once __DIR__ . '/AuthController.php';
                $controller = new \AuthController();
                $controller->logoutAuth();
                break;
            case 'auth-endpoint':
                require_once __DIR__ . '/AuthController.php';
                $controller = new \AuthController();
                $controller->authEndpoint();
                break;
            case 'add-comment':
                require_once __DIR__ . '/CommentsController.php';
                $controller = new \CommentsController();
                $controller->addComment();
                break;
            case 'delete-comment':
                require_once __DIR__ . '/CommentsController.php';
                $controller = new \CommentsController();
                $controller->deleteComment();
                break;
            case 'update-comment':
                require_once __DIR__ . '/CommentsController.php';
                $controller = new \CommentsController();
                $controller->updateComment();
                break;
            case 'races.json':
                include '../public/races_json.php';
                break;
            case 'drivers.json':
                include '../public/drivers_json.php';
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    private function loggedInUserCheck()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: /login');
        }
    }
}
