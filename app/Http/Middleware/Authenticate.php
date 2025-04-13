<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            // Return a JSON response for API requests
            response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // For non-API requests, you can keep the default redirect behavior
        parent::unauthenticated($request, $guards);
    }
}
