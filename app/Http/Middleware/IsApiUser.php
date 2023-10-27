<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsApiUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('token'))
        {
            if ($request->token !== null)
            {
                 $user = User::where('token',$request->token)->first();
                 if($user !== null)
                 {
                     return $next($request);
                 }else{
                    $error = 'Incorrect token ';
                    return response()->json($error);
                 }
            } else{
                $error = 'Token is empty ';
                return response()->json($error);
             }
        } else{
            $error = 'Token is not exists ';
            return response()->json($error);
    }
}
}
