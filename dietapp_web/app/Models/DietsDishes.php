<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietsDishes extends Model
{
    use HasFactory;

    public $table = "diets_dishes";

    

    public $timestamps = false;

    protected $fillable = [
        'diet_id_diet',
        'dish_id_dish',
        'week_day',
        'meal',
    ]; 
}
