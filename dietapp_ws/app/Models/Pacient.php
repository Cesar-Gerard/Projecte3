<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    public $table = "pacient";

    protected $fillable = [
        'id_pacient',
        'assigned_nutricionist',
        'email_pacient',
        'phone_pacient',
        'address_pacient',
        'current_diet',
    ]; 
}
