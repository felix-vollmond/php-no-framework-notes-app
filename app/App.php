<?php

namespace App;

use Core\Database;
use Core\Router;

class App
{
    public static Database $database;
    public static Router $router;
    public static int $currentUserId;
}
