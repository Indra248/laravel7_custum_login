<?php

namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (! $request->session()->has('data')) {
            $request->session()->flash('karena', "maaf login dulu bos");
            return redirect('Auth/login');
        }
        return $next($request);
    }
}
