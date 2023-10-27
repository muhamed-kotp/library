<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        //check if sender is login
        if(Auth::check()){

            return $next($request);
        }
        return redirect(route('auth.login'));
    }
}
