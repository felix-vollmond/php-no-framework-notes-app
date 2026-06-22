<?php

declare(strict_types=1);

use Core\Container\Container;
use Core\Database\Database;

return function (Container $container) {
    $container->set(
        Database::class,
        fn($c) => new Database(require(base_path('config/database.php'))),
    );
};
