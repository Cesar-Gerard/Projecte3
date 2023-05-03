<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pacient;

use Auth;

class PacientController extends Controller
{

    /**
     *  
     * */
    public function filtrar_pacient(Request $request){

        $nom = $request->nom;
        $cognoms = $request->cognom;
        $dieta = $request->dieta;
        $nutricionist = $request->nutricionist;


        $pacients = Pacient::getPacientsByFilter($nom,$cognoms,$dieta,$nutricionist);

        return json_encode($pacients);

    }



    public function filtrar_all_pacients(Request $request){

       
        $pacients = Pacient::getPacientsFromNutricionist(Auth::user()->id);

        return json_encode($pacients);

    }



    public function validar_pacients(Request $request){

        if(strlen($request->pacient_name)<=2 || strlen($request->pacient_name)>45){
            return array("status"=>"error","missatge"=>"El nom del pacient és obligatori i no pot ser menor de 2 caràcters");
        }

        if(strlen($request->pacient_cognoms)<=4 || strlen($request->pacient_cognoms)>45){
            return array("status"=>"error","missatge"=>"Els cognoms del pacient són obligatoris i no pot ser menor de 4 caràcters");
        }

        if(strlen($request->pacient_username)<=3 || strlen($request->pacient_username)>45){
            return array("status"=>"error","missatge"=>"El nom de l'usuari és obligatori i no pot ser menor de 3 caràcters");
        }

        if(strlen($request->pacient_email)<=10 || strlen($request->pacient_email)>45){
            return array("status"=>"error","missatge"=>"L'email del pacient és obligatori i no pot ser menor de 10 caràcters");
        }

        if(strlen($request->pacient_phone)<=9 || strlen($request->pacient_phone)>45){
            return array("status"=>"error","missatge"=>"L'email del pacient és obligatori i no pot ser menor de 9 caràcters");
        }

        if(strlen($request->pacient_address)<=9 || strlen($request->pacient_address)>45){
            return array("status"=>"error","missatge"=>"L'email del pacient és obligatori i no pot ser menor de 9 caràcters");
        }

        if(strlen($request->pacient_password)<=9 || strlen($request->pacient_password)>45){
            return array("status"=>"error","missatge"=>"L'email del pacient és obligatori i no pot ser menor de 9 caràcters");
        }

    }

    public function add_pacient(Request $request){

        
            $this->validar_pacients($request);

            if(User::addUser($request,Auth::user()->id)!=1){
                return array("status"=>"error","missatge"=>"El pacient no s'ha pogut crear");
            }

            return array("status"=>"ok");
        
    
    }

    
}
