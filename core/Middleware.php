<?php

namespace Core;

use Core\Auth;
use Core\Guest;

interface Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public function handle();
}
