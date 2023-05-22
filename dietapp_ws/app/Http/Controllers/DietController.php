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
        
        try{
            $data = Diets::all();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "General error: ".$ex
            ], 400);
        }

        return response()->json(compact('data'));
    }


    /**
     * Retorna els plats d'una dieta en concret
     */
    public function getDishes($diet){

        try{

            $data = Dishes::select('dishes.*','diets_dishes.meal')
                ->join('diets_dishes', 'diets_dishes.dish_id_dish', '=', 'dishes.id_dishes')
                ->where('diets_dishes.diet_id_diet','=',$diet)
                ->get();
                
                
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Databae error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "General error: ".$ex
            ], 400);
        }

        return response()->json(compact('data'));

    }


    /**
     * Retorna la informació de l'historial de l'usuari
     */
    public function getHistorialPacient($user){

        try{
            $data = HistorialPacient::where('id_patient','=',$user)->get();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "Error general: ".$ex
            ], 400);
        }

        

        return response()->json(compact('data'));


    }

    /**
     * Retorna els id dels ingredients de un plat en concret
     */
    public function getIngredients($dish){
        
        try{

            $data = Ingredients::select('ingredients.*','dishes_ingredients.quantity','dishes_ingredients.mesure')
                ->join('dishes_ingredients','dishes_ingredients.ingredient_id_ingredient','=','ingredients.id_ingredient')
                ->where('dishes_ingredients.dish_id_dish','=',$dish)
                ->get();

                

        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "General error: ".$ex
            ], 400);
        }
        
        
        return response()->json(compact('data'));

    }


    /**
     * Camps de filtre: meals_number(combobox) type(combobox)
     */
    public function filtrar_dietes(Request $request){

        $meals_number = $request->meals_number;
        $type = $request->type;

        try{
            $data = Diets::where('number_meals','=',$meals_number)->where('type_diet','=',$type)->get();
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error: ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => "General error: ".$ex
            ], 400);
        }

        return response()->json(compact('data'));
    }


    /**
     * Introduir historial del pacient 	
     */
    public function add_historial_pacient(Request $request){
        //(`id_historial`, `date`, `id_pacient`, `diet`, `weigth`, `heigth`, `chest`, `leg`, `arm`, `hip`) VALUES
        //Control date
        //start_Date
        //status
        $id_pacient = $request->id_pacient;
        $diet = $request->diet;
        $weight = $request->weight;
        $height = $request->height;
        $chest = $request->chest;
        $leg = $request->leg;
        $arm = $request->arm;
        $hip = $request->hip;
        

        //Mirar la última data del historial del pacient amb id
        //Si l'entrada no coincideix amb el id dieta, es que s'ha canviat
        //Introduïr mecanisme de treure's de la dieta des de la part del pacient o nutricionista? (o els 2)


        if($height == null || $weight == null){
            return response()->json([
                'error' => "L'amplada i l'alçada són obligatòries"
            ], 400);
        }

        try{
            //Crear una nova entrada d'historial
            HistorialPacient::create([
                'control_date' => Date('Y-m-d'),
                'id_pacient' => $id_pacient,
                'diet' => $diet,
                'weigth' => $weight,
                'heigth' => $height,
                'chest' => $chest,
                'leg' => $leg,
                'arm' => $arm,
                'hip' => $hip,

            ]);
        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => "Database error ".$ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => 'General error '.$ex
            ], 400);
        }

        return response()->json([
            'success' => "ok"
        ], 200);
        
    }


    




/*
  try{

        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                'database_error' => $ex
            ], 400);
        }catch(\Throwable $ex){
            return response()->json([
                'error' => $ex
            ], 400);
        }
 */



}
