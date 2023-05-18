<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPacient extends Model
{
    use HasFactory;

    public $table = "historial_patient";

    public $timestamps = false;

    protected $fillable = [
        'start_date',
        'id_patient',
        'diet',
        'weigth',
        'heigth',
        'chest',
        'leg',
        'arm',
        'hip',
        'control_date',
        'status',
    ]; 
}
