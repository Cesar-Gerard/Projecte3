<?php

namespace App\Models;

use DB;

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

    public static function getPacientsFromNutricionist($id){


        $pacients = DB::table('pacient')
                    ->select('users.*','pacient.*','diets.*')
                    ->join('users','users.id','=','pacient.id_pacient')
                    ->join('diets','pacient.current_diet','=','diets.id_diet')
                    ->where('pacient.assigned_nutricionist','=',$id)
                    ->get();

        return $pacients;
        
    }

}
