<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;

    public $table = "dishes";

    public $timestamps = false;

    protected $primaryKey = 'id_dishes';

    protected $fillable = [
        'id_dishes',
        'name_dish',
        'calories',
        'image_dish',
    ]; 





    public static function getAllDishes(){

        return Dishes::all();

    }



    public static function getDishesByName($name){

        return Dishes::where('name_dish','like', $name . '%' )->get();


    }
}
