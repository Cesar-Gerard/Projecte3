<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pacient;
use App\Models\Diets;

use Auth;

class DietController extends Controller
{

    /**
     *  
     * */

    public function filtrar_all_diets(Request $request){

       
        $diets = Diets::getAllDietsTypeDiets();

        return json_encode($diets);

    }



    public function filtrar_dieta(Request $request){

        $nom = $request->nom;
        $tipus_dieta = $request->cognom;

        //$pacients = Pacient::getPacientsByFilter($nom,$cognoms,$dieta,$nutricionist);

        //return json_encode($pacients);






    }
    
}
