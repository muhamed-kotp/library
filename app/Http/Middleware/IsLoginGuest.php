<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class IsLoginGuest
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()&& Auth::user()->Is_admin==0){
            return $next($request);
        };
        return redirect(route('books.index'));
    }
}