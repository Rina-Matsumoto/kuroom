<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected string $user_route  = 'user.login';
    protected string $admin_route = 'admin.login';
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        
        if (! $request->expectsJson()) {
            if($request->is('admin/*')) return route('admin.login');
            return route('login');
        }
        
        if (Auth::guard($guard)->check()) {
            if($guard == 'admin') return redirect(RouteServiceProvider::ADMIN_HOME);
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
