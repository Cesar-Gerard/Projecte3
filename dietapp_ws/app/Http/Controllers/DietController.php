<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Diets;
use App\Models\Dishes;
use App\Models\DietsDishes;
use App\Models\HistorialPacient;
use App\Models\Ingredients;


class DietController extends Controller
{
    /**
     * Retorna totes les dietes
     */
    public function getDiets(){
        $data = Diets::all();
        return response()->json(compact('data'));
    }


    /**
     * Retorna els plats d'una dieta en concret
     */
    public function getDishes($diet){

        $data = Dishes::select('dishes.*')
                ->join('diets_dishes', 'diets_dishes.dishes_id_dishes', '=', 'dishes.id_dishes')
                ->where('diets_dishes.dietas_id_dieta','=',$diet)
                ->get();

        return response()->json(compact('data'));

    }


    /**
     * Retorna la informació de l'historial de l'usuari
     */
    public function getHistorialPacient($user){

        $data = HistorialPacient::where('id_pacient','=',$user)->get();

        return response()->json(compact('data'));


    }

    /**
     * Retorna els id dels ingredients de un plat en concret
     */
    public function getIngredients($dish){
        
        $data = Ingredients::select('ingredients.*')
                ->join('dishes_ingredients','dishes_ingredients.ingredients_id_ingredient','=','ingredients.id_ingredient')
                ->where('dishes_ingredients.dishes_id_dishes','=',$dish)
                ->get();
        
        return response()->json(compact('data'));

    }

}
