<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Mail\RecuperaPassword;

use Auth;
use Mail;

class UserController extends Controller
{
    

    /**
     * Funció que permet l'entrada a la web, accés exclusiu per nutricionistes
     * 
     */
    public function login(Request $request){

        $nickname = $request->usuari;
        $pw = $request->password;

        if($nickname != null && $pw != null){

            //Comprovar que sigui un usuari que tingui rol de nutricionista
            if(Auth::attempt(["nickname_user"=>$nickname,"password"=>$pw])){

                //Passar a la pàgina de home
                return 1;

            }else{
                return -2;
            }
        }else{
            return -1;
        }
    }

    public function recupera_password(Request $request){

        try{
            $user = User::getUserByEmail($request->email);

            if($user!=null){
                Mail::to($request->email)->send(new RecuperaPassword($user->name_user,$user->lastname_user,$user->id));
            }else{
                return -2;
            }

            return 1;

        
        }catch(\Throwable $ex){
            echo $ex;
            return -1;
        }

    }




    public function canvia_contrasenya(Request $request){

        try{
            $user = User::getUserById($request->usuari);

            if($user!=null){

                if(User::updatePassword($user,$request->password)){
                    return 1;
                }

                return -1;

            }else{
                return -1;
            }

        }catch(\Throwable $ex){
            echo $ex;
            return -1;
        }


    }
}
