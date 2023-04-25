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
        'dietas_id_dieta',
        'dishes_id_dishes',
        'week_day',
        'meal',
    ]; 
}
