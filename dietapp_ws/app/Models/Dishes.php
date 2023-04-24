<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    use HasFactory;

    public $table = "dishes";

    protected $fillable = [
        'id_dishes',
        'name_dishes',
        'calories',
    ]; 
}
