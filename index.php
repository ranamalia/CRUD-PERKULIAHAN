<?php
require_once 'config/config.php';

// Simple routing system
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = str_replace('/perkuliahan1', '', $path);

// Remove query parameters
$path = strtok($path, '?');

// Default route
if ($path == '/' || $path == '') {
    $controller = new DashboardController();
    $controller->index();
} else {
    // Parse route
    $segments = explode('/', trim($path, '/'));
    $controllerName = ucfirst($segments[0]) . 'Controller';
    $action = isset($segments[1]) ? $segments[1] : 'index';
    $id = isset($segments[2]) ? $segments[2] : null;
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (method_exists($controller, $action)) {
            if ($id) {
                $controller->$action($id);
            } else {
                $controller->$action();
            }
        } else {
            // 404 error
            header("HTTP/1.0 404 Not Found");
            include 'views/404.php';
        }
    } else {
        // 404 error
        header("HTTP/1.0 404 Not Found");
        include 'views/404.php';
    }
}
?>
