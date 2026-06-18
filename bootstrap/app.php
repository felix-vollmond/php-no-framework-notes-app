<?php

require dirname(__DIR__) . '/core/Autoloader.php';
require dirname(__DIR__) . '/core/helpers.php';

use Core\Autoloader;

Autoloader::register([
    'App\\' => 'app/',
    'Core\\' => 'core/',
]);

session_start();

use Core\Application;

return new Application(
    services: require base_path('bootstrap/services.php'),
    routes: require base_path('bootstrap/routes.php'),
);
