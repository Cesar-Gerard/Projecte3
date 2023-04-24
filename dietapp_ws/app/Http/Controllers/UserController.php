<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('nickname_user','password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'invalid credentials'
                ], 400);
            }
        }catch(JWTException $e){
            return response()->json([
                'error' => 'not create token',
            ], 500);
        }

        return response()->json(compact('token'));
    }

    public function getUser($id){

        $user = User::where('id','=',$id)->first();

        return response()->json(compact('user'));
    }
}
