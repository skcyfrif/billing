<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'masteradmin' => \App\Http\Middleware\MasterAdminMiddleware::class,
            'controlpanel' => \App\Http\Middleware\ControlPanelMiddleware::class,
            'controlpaneladmin' => \App\Http\Middleware\ControlPanelAdminMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'user' => \App\Http\Middleware\UserPanelMiddleware::class,

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
