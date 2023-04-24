<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricionist extends Model
{
    use HasFactory;

    public $table = "nutricionist";

    protected $fillable = [
        'id_nutricionist',
    ]; 
}
