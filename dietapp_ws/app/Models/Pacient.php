<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    public $table = "pacient";

    public $timestamps = false;

    protected $primaryKey = 'id_pacient';

    protected $fillable = [
        'id_pacient',
        'assigned_nutricionist',
        'phone_pacient',
        'address_pacient',
        'current_diet',
    ]; 
}
