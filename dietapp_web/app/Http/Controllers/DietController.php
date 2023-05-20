<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pacient;
use App\Models\Diets;
use App\Models\Dishes;

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


    public function dishes_filtrar(Request $request){

        $nom = $request->dish_nom;

        $dishes = Dishes::getDishesByName($nom);

        return json_encode($dishes);

    }





    public function diet_add(Request $request){

        $dieta = $request->dieta;


        if(Diets::add_diet($dieta)){

        }else{

        }
        
    }



    public function diet_edit(Request $request){

        $dieta = $request->dieta;
        $id_dieta = $request->id_dieta;

        if(Diets::edit_diet($dieta,$id_dieta)){
            
        }else{

        }
        




    }
    
}
