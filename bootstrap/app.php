<?php

require dirname(__DIR__) . '/core/autoload.php';

session_start();

use Core\Application;

return new Application(
    services: require base_path('bootstrap/services.php'),
    routes: require base_path('bootstrap/routes.php'),
);
