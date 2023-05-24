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
            $pacients = $pacients->where('patients.current_diet','=',$dieta);
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


    public static function getDataPatientsDiets($id_nutricionist){


        /*
            select count(*), d.name 
            from patients p left join diets d on p.current_diet = d.id_diet
            where assigned_nutricionist = 2
            group by current_diet;
        */


        return DB::table('patients')
                ->select(DB::raw('count(*) as total'),'diets.name')
                ->leftjoin('diets','patients.current_diet','=','diets.id_diet')
                ->where('patients.assigned_nutricionist','=',$id_nutricionist)
                ->groupBy('patients.current_diet','diets.name')
                ->get();
        
    }

    public static function getDataPatientsDietsName($id_nutricionist){


            /*
            select count(*), d.name, u.name_user, u.lastname_user 
                        from patients p left join diets d on p.current_diet = d.id_diet
                                        left join users u on p.id_pacient = u.id
                        where assigned_nutricionist = 2
                        group by current_diet,u.name_user,u.lastname_user;
            */
        return DB::table('patients')
            ->select(DB::raw('count(*) as total'),'diets.name','users.name_user','users.lastname_user')
            ->leftjoin('diets','patients.current_diet','=','diets.id_diet')
            ->leftjoin('users','patients.id_pacient','=','users.id')
            ->where('patients.assigned_nutricionist','=',$id_nutricionist)
            ->groupBy('patients.current_diet','diets.name','users.name_user','users.lastname_user')
            ->get();

    }


    public static function canviaDieta($dieta, $id_pacient){

        //SI CANVIA DE DIETA, UPDATE A LA TAULA HISTORIAL_PATIENT i posar al camp status = 'F'

        /*
            $dieta = $request->dieta;
            $pacient = $request->pacient;
        */

        \DB::beginTransaction();

        try{

            $pacient = Pacient::where('id_pacient','=',$id_pacient)->first();

            $historial_pacient = HistorialPacient::where('id_patient','=',$id_pacient)->orderBy('control_date','DESC')->first();
            $historial_pacient->status = 'F';
            $historial_pacient->save();
            
            if($pacient!=null){
                $pacient->current_diet = $dieta;
                $pacient->save();

                \DB::commit();
                return true;
            }
            \DB::rollback();
            return false;
            


        }catch(\Illuminate\Database\QueryException $ex){
            echo "Query: ".$ex;
            \DB::rollback();
            return false;
        }catch(Throwable $ex){
            echo "Throwable: ".$ex;
            \DB::rollback();
            return false;
        }

    }



}
