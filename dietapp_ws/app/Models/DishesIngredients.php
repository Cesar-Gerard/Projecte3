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
        'dish_id_dish',
        'ingredient_id_ingredient',
        'quantity',
        'mesure',
    ]; 
}
