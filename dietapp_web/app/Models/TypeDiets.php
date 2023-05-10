<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDiets extends Model
{
    use HasFactory;

    public $table = "type_diets";

    public $timestamps = false;

    protected $primaryKey = 'id_type';

    protected $fillable = [
        'id_type',
        'name_type',
    ]; 


    public static function getTypeById($diet_type){


        $type_diet = TypeDiets::where('id_type','=',$diet_type)->first();


        return $type_diet;

    }


    public static function getAllTypes(){
        return TypeDiets::all();
    }
}