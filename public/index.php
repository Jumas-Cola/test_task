<?php

require __DIR__.'/../src/bootstrap.php';

use JumasCola\TestTask\Controllers\IndexController;
use JumasCola\TestTask\Controllers\UrlController;

$path = $_SERVER['REQUEST_URI'];

$routes = [
    ['/[0-9A-Fa-f]+', 'GET', UrlController::class, 'show'],
    ['/', 'POST', UrlController::class, 'store'],
    ['/', 'GET', IndexController::class, 'index'],
];

foreach ( $routes as $route ) {
    $route[0] = trim($route[0], '/');

    if ($_SERVER['REQUEST_METHOD'] == $route[1] and 
        preg_match("/{$route[0]}/", $path)) {

        echo (new $route[2])->{$route[3]}();

        die();
    }
}

http_response_code(404);
die();
