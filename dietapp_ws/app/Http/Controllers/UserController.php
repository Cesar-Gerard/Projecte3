<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Pacient;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('nickname_user','password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => $credentials
                ], 400);
            }
        }catch(JWTException $e){
            return response()->json([
                'error' => 'not create token',
            ], 500);
        }

        $us = User::where('nickname_user','=',$request->nickname_user)->first();
        $data = array(
            'user' => $us,
            'token' => $token,
        );

        
        return response()->json(compact('data'));
    }

    public function getUser($id){

        $user = User::where('id','=',$id)->first();

        return response()->json(compact('user'));
    }

    public function getPacient($id){
        
        $data = Pacient::where('id_pacient','=',$id)->first();

        return response()->json(compact('data'));
    }

    

}
