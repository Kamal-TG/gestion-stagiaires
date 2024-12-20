<?php

namespace Core\Middleware;

use Core\Middleware\Guest;
use Core\Middleware\Auth;

class middleware
{
    private const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        if (! $key) {
            return;
        }
        
        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new \Exception("Uknown middleware: {$key}");
        }
        
        (new $middleware)->handle();
    }
}


