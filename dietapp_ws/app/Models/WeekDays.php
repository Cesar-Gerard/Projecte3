<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDays extends Model
{
    use HasFactory;

    public $table = "week_days";

    protected $fillable = [
        'id_day',
        'name_day',
    ]; 
}