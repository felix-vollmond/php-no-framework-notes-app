<?php

require __DIR__ . '/Autoloader.php';

\Core\Autoloader::register((static function () {
    $bootstrapConfigPath = dirname(__DIR__) . '/bootstrap/autoload.php';

    $bootstrapConfig = file_exists($bootstrapConfigPath)
        ? require($bootstrapConfigPath)
        : [];

    return [
        'Core\\' => 'core/',
        ...$bootstrapConfig,
    ];
})());

require __DIR__ . '/helpers.php';
//                ^^^^^^^^^^^^^
// Such files should be added to the Autoloader too
