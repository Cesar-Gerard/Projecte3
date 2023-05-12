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

        
        $nom = $request->dieta_nom;
        $tipus_dieta = $request->dieta_tipus;

        $dietes = Diets::getDietsFilter($nom,$tipus_dieta);




        return json_encode($dietes);

    }
    
}
