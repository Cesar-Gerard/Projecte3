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
            return 1;
        }else{
            return -1;
        }
        
    }



    public function diet_edit(Request $request){

        $dieta = $request->dieta;
        $id_dieta = $request->id_dieta;

        if(Diets::edit_diet($dieta,$id_dieta)){
            $diet = Diets::getDietById($id_dieta)->first();
            return array("status"=>1,"calories"=>$diet->calories);
        }else{
            return array("status"=>-1);
        }

    }


    public function diet_delete(Request $request){

        $id_diet = $request->id_diet;

        //Mirar si la dieta la està seguint algú
        if(Diets::checkDietIsUsed($id_diet)==0){
            
            return array("status"=>-1,"message"=>"La dieta no es pot eliminar ja que hi ha pacients que la segueixen actualment");
        }else{

            //Eliminar dieta 
            if(Diets::deleteDiet($id_diet)){
                return array("status"=>1,"message"=>"La dieta s'ha eliminat correctament");
            }else{
                return array("status"=>-1,"message"=>"La dieta no s'ha pogut eliminar");
            }

        }


    }


    public function diet_clone(Request $request){


        $dieta = $request->dieta;

        if(Diets::add_diet($dieta)){
            return 1;
        }else{
            return -1;
        }


    }
    
}
