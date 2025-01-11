<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

session_start([
    'cookie_lifetime' => 10,
    'gc_maxlifetime' => 24 * 60 * 60,
    'cookie_path' => '/',
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'lax'
]);

require BASE_PATH . 'Core/functions.php';

// manual autoloading
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Core\Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previousUrl());
}

Session::unflash();