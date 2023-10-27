<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100|min:5',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

       $user = User::create([
            'name' => $request->name  ,
            'email'=> $request->email ,
            'password'=> Hash::make($request->password),
            'token' => Str::random(64),
        ]);


        return response()->json($user->token);
    }
    public function handleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100|min:5',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }



        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]) ;

        if(!$is_login)
        {
            $error = 'the credintials is not correct';
            return response()->json($error);
        }

        $user = User::where('email',$request->email)->first();
        $new_token = Str::random(64);
        $user->update([
            'token' => $new_token
        ]);

        return response()->json($new_token);
    }

    public function logout(Request $request)
    {
        $user = User::where('token',$request->token)->first();

         if($user == null){
            $error = 'token not correct';
            return response()->json($error);
         }
        $user->update([
            'token'=> NULL
        ]);
        $success = 'Logged out successfully';
        return response()->json($success);
    }
}
