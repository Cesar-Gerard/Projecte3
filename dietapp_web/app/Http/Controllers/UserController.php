<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

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
                return array("status"=>"-2");
            }
        }else{
            return array("status"=>"-1");
        }



    }


}
