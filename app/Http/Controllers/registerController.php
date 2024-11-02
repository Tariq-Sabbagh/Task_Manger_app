<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function singup(signupRequest $request){

        if(User::where('email',$request->email)->exists()){
            return response()->json([
                "succes"=>false,
                "message"=>"email already exist",
            ], 400);

        }
        $user=User::create($request->validated());
        return response()->json(
            [
                "succes"=>true,
                "message"=>"email created succesfully",
                $user
            ]
            , 200);

    }
}
