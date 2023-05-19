<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pacient extends Model
{
    use HasFactory;

    public $table = "patients";

    public $timestamps = false;

    protected $primaryKey = 'id_pacient';

    protected $fillable = [
        'id_pacient',
        'assigned_nutricionist',
        'phone_patient',
        'address_patient',
        'current_diet',
    ]; 

    public static function getPacientsFromNutricionist($id){


        $pacients = DB::table('patients')
                    ->select('users.*','patients.*','diets.*')
                    ->leftJoin('users','users.id','=','patients.id_pacient')
                    ->leftJoin('diets','patients.current_diet','=','diets.id_diet')
                    ->where('patients.assigned_nutricionist','=',$id)
                    ->get();
        

        return $pacients;
        
    }


    public static function getPacientsByFilter($nom,$cognom,$dieta,$nutricionist){


        

        $pacients = DB::table('patients')
            ->select('users.*','patients.*','diets.*')
            ->join('users','users.id','=','patients.id_pacient')
            ->join('diets','patients.current_diet','=','diets.id_diet')
            ->where('patients.assigned_nutricionist','=',$nutricionist);

        if(strlen($nom)!=0){
            $pacients = $pacients->where('users.name_user','like',$nom.'%');        
        }

        if(strlen($cognom)!=0){
            $pacients = $pacients->where('users.lastname_user','like',$cognom.'%');
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


    public static function getPacient($pacient,$nutricionist){
        
        return DB::table('patients')
                ->select('users.*','patients.*')
                ->leftJoin('users','users.id','=','patients.id_pacient')
                ->where('users.id','=',$pacient)
                ->first();

    }


    public static function getPacientById($id){
        return Pacient::where('id_pacient','=',$id)->first();
    }


}
