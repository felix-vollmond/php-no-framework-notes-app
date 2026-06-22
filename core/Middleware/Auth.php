<?php

namespace Core\Middleware;

class Auth implements Middleware
{
    public function handle()
    {
        if (! isset($_SESSION['user'])) {
            redirect('/login');
        }
    }
}
