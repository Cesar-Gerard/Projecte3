<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDiets extends Model
{
    use HasFactory;

    public $table = "type_diets";

    protected $fillable = [
        'id_type',
        'name_type',
    ]; 
}