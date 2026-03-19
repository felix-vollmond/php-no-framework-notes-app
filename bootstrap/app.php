<?php

require dirname(__DIR__) . '/core/helpers.php';
require dirname(__DIR__) . '/core/autoload.php';

autoload_register([
    'App\\' => 'app/',
    'Core\\' => 'core/',
]);

use Core\Application;

return new Application(
    services: require base_path('bootstrap/services.php'),
    routes: require base_path('bootstrap/routes.php'),
);
