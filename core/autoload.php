<?php

require __DIR__ . '/Autoloader.php';

\Core\Autoloader::register([
    'Core\\' => 'core/',
    ...require(\dirname(__DIR__) . '/bootstrap/autoload.php'),
]);

require __DIR__ . '/helpers.php';
//                ^^^^^^^^^^^^^
// Such files should be added to the Autoloader too
