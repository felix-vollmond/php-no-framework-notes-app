<?php

namespace Core\Middleware;

use Override;

class Guest implements Middleware
{
    #[Override]
    public function handle(): void
    {
        if (isset($_SESSION['user'])) {
            redirect('/');
        }
    }
}
