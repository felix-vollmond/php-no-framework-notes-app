<?php

namespace Core\Middleware;

use Override;

class Auth implements Middleware
{
    #[Override]
    public function handle(): void
    {
        if (! isset($_SESSION['user'])) {
            redirect('/login');
        }
    }
}
