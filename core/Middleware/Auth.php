<?php

declare(strict_types=1);

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
