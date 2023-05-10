<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class HistorialPacient extends Model
{
    use HasFactory;

    public $table = "historial_pacient";

    public $timestamps = false;

    protected $primaryKey = 'id_historial';

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


    public static function getProgresActualPacient($pacient,$dieta){

        /*
            select hp.date, hp.heigth, hp.weigth
            from historial_pacient hp join diets d on hp.diet = d.id_diet
                                    join pacient p on p.id_pacient = hp.id_pacient
            where p.id_pacient = 1 and d.id_diet=1;

        */


        $progres = DB::table('historial_pacient')
            ->select('historial_pacient.date','historial_pacient.heigth','historial_pacient.weigth')
            ->join('diets','diets.id_diet','=','historial_pacient.diet')
            ->join('pacient','pacient.id_pacient','=','historial_pacient.id_pacient')
            ->where('pacient.id_pacient','=',$pacient)
            ->where('diets.id_diet','=',$dieta)
            ->get();
        
        return $progres;

    }

    public static function getDietesAcabades($pacient,$dieta_actual){

       
        return $dietes_acabades =  DB::table('historial_pacient')
                            ->select('diet')
                            ->distinct()
                            ->where('diet','!=',$dieta_actual)
                            ->where('id_pacient','=',$pacient)
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
}
