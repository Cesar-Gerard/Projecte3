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

        



    }

    
}
