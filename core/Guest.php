<?php

namespace Core;

use Core\Middleware;

class Guest implements Middleware
{
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            redirect('/');
        }
    }
}
