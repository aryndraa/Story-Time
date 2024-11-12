<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogRequestMiddleware;
use Barryvdh\Debugbar\Middleware\DebugbarEnabled;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(LogRequestMiddleware::class);
        $middleware->append(DebugbarEnabled::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
