<?php

namespace Core\Middleware;

interface Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public function handle();
}
