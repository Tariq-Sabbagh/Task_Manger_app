<?php

namespace App\Http\Controllers;

use App\Http\Requests\signinRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signin(signinRequest $request)
    {
        $user=$request->validated();
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            if (Hash::check($request->password, $user->password))
            {
                return response()->json(
                    [
                        "succes"=>true,
                        "email"=>$request->email,
                        "password"=>$request->password,
                        'message' => 'Login successful'
                    ]
                    , 200);}
                    else
                    {
                        return response()->json([
                            "succes"=>false,
                            "message"=>"wrong password",
                        ], 400);
                    }
            }
            else
            {
                return response()->json([
                    "succes"=>false,
                    "message"=>"unauthenticated",
                ], 400);
            }
        }
    }

