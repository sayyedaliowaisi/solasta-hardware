<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(
    basePath: dirname(__DIR__)
)
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        /*
        |--------------------------------------------------------------------------
        | Authentication Redirects
        |--------------------------------------------------------------------------
        |
        | Admin protected route ko logged-out user access kare,
        | to Laravel usse admin login page par redirect karega.
        |
        */

        $middleware->redirectGuestsTo(
            fn (Request $request) => route('admin.login')
        );


        /*
        |--------------------------------------------------------------------------
        | Authenticated Admin Redirect
        |--------------------------------------------------------------------------
        |
        | Logged-in admin /admin/login open kare to dashboard par bhej do.
        |
        */

        $middleware->redirectUsersTo(
            fn (Request $request) => route('admin.dashboard')
        );
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->create();