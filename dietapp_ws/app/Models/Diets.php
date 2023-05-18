<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diets extends Model
{
    use HasFactory;

    public $table = "diets";

    public $timestamps = false;

    protected $fillable = [
        'id_diet',
        'name',
        'calories',
        'number_meals',
        'description',
        'type_diet',
    ]; 
}
