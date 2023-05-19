<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

use App\Models\DietsDishes;

class Diets extends Model
{
    use HasFactory;

    public $table = "diets";

    public $timestamps = false;

    protected $primaryKey = 'id_diet';

    protected $fillable = [
        'id_diet',
        'name',
        'calories',
        'number_meals',
        'description',
        'type_diet',
    ]; 


    public static function getDietById($diet){

        return Diets::where('id_diet','=',$diet)->first();


    }

    public static function getDietByIdType($diet){

        return DB::table('diets')
                ->select('diets.*','type_diets.name_type')
                ->join('type_diets','diets.type_diet','=','type_diets.id_type')
                ->where('diets.id_diet','=',$diet)
                ->first();


    }


    public static function getAllDietsTypeDiets(){

        return DB::table('diets')
                ->select('diets.*','type_diets.name_type')
                ->join('type_diets','diets.type_diet','=','type_diets.id_type')
                ->get();
        
    }



    public static function getDietsFilter($diet_name, $tipus_dieta){



        $diets = DB::table('diets')
        ->select('diets.*','type_diets.name_type')
        ->join('type_diets','diets.type_diet','=','type_diets.id_type');



        if(strlen($diet_name)!=0){
            $diets = $diets->where('name','like', $diet_name . '%');
        }

        if($tipus_dieta != -1){
            $diets = $diets->where('diets.type_diet','=',$tipus_dieta);
        }


        $diets = $diets->get();


        $arr_dietes = array();
        foreach($diets as $diet){
            array_push($arr_dietes,$diet);
        }

        return $arr_dietes;

    }


    public static function getDietDietsDishesByMeals($diet,$id_meal){

        $diets = DB::table('diets')
                    ->select('diets_dishes.*','dishes.name_dish')
                    ->join('diets_dishes','diets.id_diet','=','diets_dishes.diet_id_diet')
                    ->join('dishes','dishes.id_dishes','=','diets_dishes.dish_id_dish')
                    ->where('diets_dishes.meal','=',$id_meal)
                    ->where('diets.id_diet','=',$diet)
                    ->orderBy('week_day')
                    ->orderBy('meal')
                    ->get();

        return $diets;


    }


    public static function add_diet($dieta){


/*

    JSON 
    /*
        let dieta = {};
        dieta.nom = nom;
        dieta.descripcio = descripcio;
        dieta.tipus = tipus_dieta;
        dieta.esmorzars = esmorzars;
        dieta.dinars = dinars;
        dieta.berenars = berenars;
        dieta.sopars = sopars;
        dieta.migdies = migdies;
    */

/*

DB: 
    name
    calories(ho ha de fer un trigger)
    number_meals,
    description,
    tipus_dieta      
*/ 

/*
    dietas_id_dieta
    dishes_id_dishes
    week_day
    meal
*/

        

        try{
            \DB::beginTransaction();        

            $diet = new Diets();
            $diet->name = $dieta['nom'];
            $diet->calories = 0;
            $diet->number_meals = 5;
            $diet->description = $dieta['descripcio'];
            $diet->type_diet = $dieta['tipus'];

            $diet->save();
           
            
            $id_dieta_nou = $diet->id_diet;

            $arr_meals = array();
            array_push($arr_meals,"esmorzars");
            array_push($arr_meals,"dinars");
            array_push($arr_meals,"berenars");
            array_push($arr_meals,"sopars");
            array_push($arr_meals,"migdies");

            $j = 0;
            $k = 1;
            foreach($arr_meals as $meal){
               

                for($i=1; $i < count($dieta[$meal])+1; $i++){
                    $diets_dishes = new DietsDishes();
                    
                    $diets_dishes->diet_id_diet = $id_dieta_nou;
                    
                    for($l = 0; $l < count($dieta[$meal][$i]); $l++){
                        $diets_dishes->dish_id_dish = $dieta[$meal][$i][$l];

                        $diets_dishes->week_day = $i+1;
                        $diets_dishes->meal = $k;
    
                        $diets_dishes->save();
                    }
                    

                }
                
                $k++;
            }
            die();

            \DB::commit();
            
        }catch(\Illuminate\Database\QueryException $ex){
            echo $ex;
            \DB::rollback();
            return false;
        }catch(Throwable $ex){
            echo $ex;
            \DB::rollback();
            return false;
        }
        




    }

    
}
