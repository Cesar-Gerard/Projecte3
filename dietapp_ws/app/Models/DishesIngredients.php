<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishesIngredients extends Model
{
    use HasFactory;

    public $table = "dishes_ingredients";

    public $timestamps = false;

    protected $fillable = [
        'dishes_id_dishes',
        'ingredients_id_ingredient',
        'quantity',
        'mesure',
    ]; 
}
