<?php
require_once '../config/init.php';

class PatternRouter
{
    public function route()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uriSegments = explode('/', trim($uri, '/'));

        $controllerName = 'Home';
        $methodName = 'index';

        if (isset($uriSegments[0]) && $uriSegments[0] != '') {
            $controllerName = ucfirst(strtolower($uriSegments[0]));
        }
        if (isset($uriSegments[1])) {
            $methodName = strtolower($uriSegments[1]);
        }

        $controllerClassName = $controllerName . 'Controller';
        $controllerFilePath = __DIR__ . '/controllers/' . $controllerClassName . '.php';
        
        if (file_exists($controllerFilePath)) {
            require_once $controllerFilePath;

            // Make sure that the class and method exist
            if (class_exists($controllerClassName) && method_exists($controllerClassName, $methodName)) {
                $controller = new $controllerClassName();
                $controller->$methodName();
            } else {
                http_response_code(404);
                echo "Method not found.";
            }
        } else {
            http_response_code(404);
            echo $controllerFilePath;
            echo "Controller not found.";
        }
    }
}
