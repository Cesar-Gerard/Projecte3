<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPacient extends Model
{
    use HasFactory;

    public $table = "historial_pacient";

    public $timestamps = false;

    protected $fillable = [
        'id_historial',
        'date',
        'id_pacient',
        'diet',
        'weigth',
        'heigth',
        'chest',
        'leg',
        'arm',
        'hip'
    ]; 
}

