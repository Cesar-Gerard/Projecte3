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

    
}
