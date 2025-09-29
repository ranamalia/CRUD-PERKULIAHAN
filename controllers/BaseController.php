<?php
class BaseController {
    protected function loadView($view, $data = []) {
        extract($data);
        include 'views/layouts/header.php';
        include 'views/layouts/sidebar.php';
        include "views/$view.php";
        include 'views/layouts/footer.php';
    }
    
    protected function redirect($url) {
        header("Location: " . BASE_URL . $url);
        exit();
    }
    
    protected function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}
?>
