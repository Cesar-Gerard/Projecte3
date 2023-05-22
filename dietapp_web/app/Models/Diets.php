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
                    ->select('diets_dishes.*','dishes.name_dish','dishes.image_dish')
                    ->join('diets_dishes','diets.id_diet','=','diets_dishes.diet_id_diet')
                    ->join('dishes','dishes.id_dishes','=','diets_dishes.dish_id_dish')
                    ->where('diets_dishes.meal','=',$id_meal)
                    ->where('diets.id_diet','=',$diet)
                    ->orderBy('diets_dishes.week_day')
                    ->orderBy('diets_dishes.meal')
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
            $diet->number_meals = 5;
            $diet->calories = 0;
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

            //Array de meals
                //Array que conté cada dia de la semana d'aquell meal
                    //

            foreach($arr_meals as $meal){
               
                for($dies_meal=1; $dies_meal < count($dieta[$meal]); $dies_meal++){
                    
                    
                    for($meal_dia = 0; $meal_dia < count($dieta[$meal][$dies_meal]); $meal_dia++){

                        $diets_dishes = new DietsDishes();
                    
                        $diets_dishes->diet_id_diet = $id_dieta_nou;
                        
                        $diets_dishes->dish_id_dish = $dieta[$meal][$dies_meal][$meal_dia];

                        
                        $diets_dishes->week_day = $dies_meal;
                        $diets_dishes->meal = $k;
    
                        $diets_dishes->save();
                        
                    }
                    

                }
                
                $k++;
            }
            

            \DB::commit();
            return true;

        }catch(\Illuminate\Database\QueryException $ex){
            echo "QUery: ".$ex;
            \DB::rollback();
            return false;
        }catch(Throwable $ex){
            echo "Throwable: ".$ex;
            \DB::rollback();
            return false;
        }
        




    }



    public static function edit_diet($dieta,$id_dieta){

        try{

            \DB::beginTransaction();

            //1. Eliminar tots els registres de la dieta de la taula diets_dishes
            $diet_dish_e = DietsDishes::where('diet_id_diet','=',$id_dieta)->get();
            
            foreach($diet_dish_e as $dde){
                $dde->delete();
            }

            $diet_dish_e = DietsDishes::where('diet_id_diet','=',$id_dieta)->get();
            


            //2. Tornar a inserir tota la dieta
            $diet = Diets::where('id_diet','=',$id_dieta)->first();
            $diet->name = $dieta['nom'];
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

            //Array de meals
                //Array que conté cada dia de la semana d'aquell meal
                    //

            foreach($arr_meals as $meal){
               
                for($dies_meal=1; $dies_meal < count($dieta[$meal]); $dies_meal++){
                    
                    
                    for($meal_dia = 0; $meal_dia < count($dieta[$meal][$dies_meal]); $meal_dia++){

                        $diets_dishes = new DietsDishes();
                    
                        $diets_dishes->diet_id_diet = $id_dieta;
                        
                        $diets_dishes->dish_id_dish = $dieta[$meal][$dies_meal][$meal_dia];

                        
                        $diets_dishes->week_day = $dies_meal;
                        $diets_dishes->meal = $k;
    
                        $diets_dishes->save();
                        
                    }
                    

                }
                
                $k++;
            }
            

            \DB::commit();
            return true;



        }catch(\Illuminate\Database\QueryException $ex){
            echo "Query: ".$ex;
            \DB::rollback();
            return false;
        }catch(Throwable $ex){
            echo "Throwable: ".$ex;
            \DB::rollback();
            return false;
        }


    }


    public static function checkDietIsUsed($id_diet){

        /*
        
            select d.*
            from diets d left join patients p on d.id_diet = p.current_diet
            where p.current_diet is null and d.current_diet = 5;
        
        */


        $diets = DB::table('diets')
                    ->select('diets.id_diet')
                    ->leftjoin('patients','diets.id_diet','=','patients.current_diet')
                    ->whereNull('patients.current_diet')
                    ->where('diets.id_diet','=',$id_diet)
                    ->get();
        
        
        return count($diets);



    }

    public static function deleteDiet($id_diet){

        try{

            \DB::beginTransaction();
            //Eliminar els registres de diets_dishes
            //Eliminar el registre de la taula diets

            $diets_dishes = DietsDishes::where('diet_id_diet','=',$id_diet)->get();

            foreach($diets_dishes as $dd){
                $dd->delete();
            }

            $diet = Diets::where('id_diet','=',$id_diet)->first();
            $diet->delete();


            \DB::commit();
            return true;

        }catch(\Illuminate\Database\QueryException $ex){
            echo "Query: ".$ex;
            \DB::rollback();
            return false;
        }catch(Throwable $ex){
            echo "Throwable: ".$ex;
            \DB::rollback();
            return false;
        }



    }


    
}
