<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

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
        'tipus_dieta',
    ]; 


    public static function getDietById($diet){

        return Diets::where('id_diet','=',$diet)->first();


    }

    public static function getDietByIdType($diet){

        return DB::table('diets')
                ->select('diets.*','type_diets.name_type')
                ->join('type_diets','diets.tipus_dieta','=','type_diets.id_type')
                ->where('diets.id_diet','=',$diet)
                ->first();


    }


    public static function getAllDietsTypeDiets(){

        return DB::table('diets')
                ->select('diets.*','type_diets.name_type')
                ->join('type_diets','diets.tipus_dieta','=','type_diets.id_type')
                ->get();
        
    }



    public static function getDietsFilter($diet_name, $tipus_dieta){



        $diets = DB::table('diets')
        ->select('diets.*','type_diets.name_type')
        ->join('type_diets','diets.tipus_dieta','=','type_diets.id_type');



        if(strlen($diet_name)!=0){
            $diets = $diets->where('name','like', $diet_name . '%');
        }

        if($tipus_dieta != -1){
            $diets = $diets->where('diets.tipus_dieta','=',$tipus_dieta);
        }


        $diets = $diets->get();


        $arr_dietes = array();
        foreach($diets as $diet){
            array_push($arr_dietes,$diet);
        }

        return $arr_dietes;

    }

    
}
