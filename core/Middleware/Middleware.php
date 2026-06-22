<?php

namespace Core\Middleware;

interface Middleware
{
    /**
     * @var array<string, class-string>
     */
    public const array MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public function handle(): void;
}
