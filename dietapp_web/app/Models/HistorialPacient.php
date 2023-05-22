<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class HistorialPacient extends Model
{
    use HasFactory;

    public $table = "historial_patient";

    public $timestamps = false;

    protected $primaryKey = 'id_historial';
    

    protected $fillable = [
        'id_historial',
        'start_date',
        'id_patient',
        'diet',
        'weight',
        'height',
        'chest',
        'leg',
        'arm',
        'hip',
        'control_date',
        'status',
    ]; 


    public static function getProgresActualPacient($pacient,$dieta){

        /*
            select hp.date, hp.heigth, hp.weigth
            from historial_pacient hp join diets d on hp.diet = d.id_diet
                                    join pacient p on p.id_pacient = hp.id_pacient
            where p.id_pacient = 1 and d.id_diet=1;
        */


        $progres = DB::table('historial_patient')
            ->select('historial_patient.control_date','historial_patient.heigth','historial_patient.weigth')
            ->join('diets','diets.id_diet','=','historial_patient.diet')
            ->join('patients','patients.id_pacient','=','historial_patient.id_patient')
            ->where('patients.id_pacient','=',$pacient)
            ->where('diets.id_diet','=',$dieta)
            ->get();
        
        return $progres;

    }

    public static function getDietesAcabades($pacient,$dieta_actual){

       
        return $dietes_acabades =  DB::table('historial_patient')
                            ->select('diet')
                            ->distinct()
                            ->where('diet','!=',$dieta_actual)
                            ->where('id_patient','=',$pacient)
                            ->get();

    }


    public static function getProgresHistorialPacient($pacient,$dieta_actual){
        
        /** 
         * Ha de retornar la informació de la dieta excepte la última feta (dieta_actual de la taula pacient)
         * Recorrer historial_pacient i quedar-se amb dietes sense repetir
        */

        $progres = HistorialPacient::where('diet','=',$dieta_actual)->get();
    
        return $progres;


    }


    public static function getCanvisDietesUsuaris($id_nutricionista){

        //Pacients
        //Usuaris
        //Dieta

        /*
            select h.start_date, u.name_user, u.lastname_user, d.name 
            from historial_patient h join patients p on h.id_patient = p.id_pacient
                                    join users u on p.id_pacient = u.id
                                    join diets d on d.id_diet = h.diet
            where p.assigned_nutricionist = 2 and h.status = 'F'
            order by h.start_date desc;
        */

        return $canvis_dietes = DB::table('historial_patient')
                            ->select('historial_patient.start_date','users.name_user','users.lastname_user','diets.name')
                            ->join('patients','historial_patient.id_patient','=','patients.id_pacient')
                            ->join('users','patients.id_pacient','=','users.id')
                            ->join('diets','diets.id_diet','=','historial_patient.diet')
                            ->where('patients.assigned_nutricionist','=',$id_nutricionista)
                            ->where('historial_patient.status','=','F')
                            ->orderBy('historial_patient.start_date','DESC')
                            ->get(); 

        
    }
}
