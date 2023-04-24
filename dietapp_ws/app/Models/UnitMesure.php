<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMesure extends Model
{
    use HasFactory;

    public $table = "unit_mesure";

    protected $fillable = [
        'id_unit',
        'abreviation',
        'unit_name'
    ]; 
}