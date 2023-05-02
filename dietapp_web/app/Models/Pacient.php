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


    public static function getPacientsByFilter($nom,$cognom,$dieta,$nutricionist){


        

        $pacients = DB::table('pacient')
            ->select('users.*','pacient.*','diets.*')
            ->join('users','users.id','=','pacient.id_pacient')
            ->join('diets','pacient.current_diet','=','diets.id_diet')
            ->where('pacient.assigned_nutricionist','=',$nutricionist);

        if(strlen($nom)!=0){
            $pacients = $pacients->where('users.name_user','like','%'.$nom.'%');        
        }

        if(strlen($cognom)!=0){
            $pacients = $pacients->where('users.lastname_user','like','%'.$cognom.'%');
        }

        if($dieta!=-1){
            $pacients = $pacients->where('pacient.current_diet','=',$dieta);
        }
        

        $pacients = $pacients->get();

        $arr_pacients = array();
        foreach($pacients as $pacient){
            array_push($arr_pacients,$pacient);
        }

        return $arr_pacients;


    
        



    }

}
