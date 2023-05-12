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

        $pacient = Pacient::where('id_pacient','=',$us->id)->first();
        $nutricionist = User::where('id','=',$pacient->assigned_nutricionist)->first();
        
        $data = array(
            'user' => $us,
            'nutricionist' => $nutricionist->name_user . " " . $nutricionist->lastname_user,
            'token' => $token,
        );

        
        return response()->json(compact('data'));
    }

    
    public function getUser($id){

        
        try{
            $user = User::where('id','=',$id)->first();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "General error: ".$ex
            ], 400);
        }

        return response()->json(compact('user'));
    }

    public function getPacient($id){
        
        try{
            $data = Pacient::where('id_pacient','=',$id)->first();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "Error general: ".$ex
            ], 400);
        }

        return response()->json(compact('data'));
    }

    
    /**
     * Modificar la meva informació com a usuari i pacient
     * INSERT INTO `users` (`id`, `name_user`, `lastname_user`, `nickname_user`, `password`, `type_user`) VALUES
     * INSERT INTO `pacient` (`id_pacient`, `assigned_nutricionist`, `email_pacient`, `phone_pacient`, 
     * `address_pacient`, `current_diet`) VALUES
     */
    public function update_user(Request $request){

        $id_pacient = $request->id;
        
        $name_user = $request->name_user;
        $lastname_user = $request->lastname_user;
        $phone_pacient = $request->phone_pacient;
        $address_pacient = $request->address_pacient;

        try{
            $user = User::where('id','=',$id_pacient)->first();
            $pacient = Pacient::where('id_pacient','=',$id_pacient)->first();

            if($user==null || $pacient == null){
                return response()->json([
                    'error' => "El pacient no conté l'identificador esperat"
                ], 400);
            }


            $user->name_user = $name_user;
            $user->lastname_user = $lastname_user;
            $user->save();

            $pacient->phone_pacient = $phone_pacient;
            $pacient->address_pacient = $address_pacient;
            $pacient->save();

            return response()->json([
                'success' => "ok"
            ], 200);


        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error ".$ex
            ], 400);

        }catch(\Throwable $ex){
            return response()->json([
                'error' => 'General error '.$ex
            ], 400);
        }

    }


    /**
     * Modificar la contrasenya de l'usuari
     */
    public function update_password(Request $request){
        
        $id_pacient = $request->id;
        $password = $request->password;

        try{

            $user = User::where('id','=',$id_pacient)->first();
            $user->password = bcrypt($request->password);
            $user->save();

        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error ".$ex
            ], 400);

        }catch(\Throwable $ex){
            return response()->json([
                'error' => 'General error '.$ex
            ], 400);
        }

    }

    /**
     * Retorna el nom del nutricionista */ 
    public function getNutricionistName($nutricionist){

        try{

            //Comprovar que l'user que ens passa és nutricionista
            $user = User::where('id','=',$nutricionist)->where('type_user','=','N')->first();
            

            if($user!=null){
                $data = array(
                    "name_user" => $user->name_user,
                    "lastname_user" => $user->lastname_user,
                );
                

                return response()->json(compact('data'));

            }else{
                return response()->json([
                    'error' => 'Not found'
                ], 404);
            }

        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error ".$ex
            ], 400);

        }catch(\Throwable $ex){
            return response()->json([
                'error' => 'General error '.$ex
            ], 400);
        }
        
    }

    



}
