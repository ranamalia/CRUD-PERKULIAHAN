<?php
// Application Configuration
define('BASE_URL', 'http://localhost/perkuliahan1/');
define('APP_NAME', 'Sistem Perkuliahan');

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'Perkuliahan1');
define('DB_USER', 'root');
define('DB_PASS', '');

// Include autoloader
spl_autoload_register(function ($class_name) {
    $directories = [
        'models/',
        'controllers/',
        'config/'
    ];
    
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>
