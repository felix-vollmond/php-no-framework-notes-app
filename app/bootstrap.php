<?php

require dirname(__DIR__) . '/core/helpers.php';
require dirname(__DIR__) . '/core/autoload.php';

autoload_register([
    'App\\' => 'app/',
    'Core\\' => 'core/',
]);

use Core\Application;

$app = new Application(
    services: require base_path('app/services.php'),
    routes: require base_path('app/routes.php'),
);

$app->handleRequest();
