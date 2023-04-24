<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealDishes extends Model
{
    use HasFactory;

    public $table = "meal_dishes";

    protected $fillable = [
        'id_meal',
        'name_meal',
    ]; 
}
