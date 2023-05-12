<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\DietController;


use App\Models\Pacient;
use App\Models\Diets;
use App\Models\TypeDiets;
use App\Models\HistorialPacient;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("index");



Route::get('/home', function(){
    if(Auth::check()){
        return view('home');
    }
    return redirect(route("index"));
    
})->name("home");

Route::get('/pacients',function(){
    if(Auth::check()){

        //Llista de tots els pacients que té assignat el nutricionista
        $pacients = Pacient::getPacientsFromNutricionist(Auth::user()->id);
        $diets = Diets::all();

        
        return view('pacients',['pacients'=>$pacients,"diets"=>$diets]);
    }
    return redirect(route("index"));
})->name("pacients");

Route::get('/pacient/{pacient}',function($pacient){

    if(Auth::check()){

        //En cas que posi la adreça i no sigui el seu pacient, no deixar entrar
        $pacient = Pacient::getPacient($pacient,Auth::user()->id);
        if($pacient !=null){

            //Saber informació de la dieta actual (si té)
            $diet = null;
            if($pacient->current_diet != null){
                $diet = Diets::getDietById($pacient->current_diet);
                $type_diet = TypeDiets::getTypeById($diet->id_diet);

                //Dades directes (Sense formatar)
                $historial_actual = HistorialPacient::getProgresActualPacient($pacient->id_pacient,$diet->id_diet);
               
                $dietes_acabades_q = HistorialPacient::getDietesAcabades($pacient->id,$pacient->current_diet);
                
            

                $grafic_progres_actual = array();//Array que mostra la info de la dieta actual
                $grafic_historial_diets = array();//Array que guarda la info de totes les altres dietes ja acabades
                $dietes_acabades = array();//Array que guarda els objectes de la dieta



                

                
                foreach($historial_actual as $ha){

                    array_push($grafic_progres_actual,
                        array(
                            "dia" => date("d",strtotime($ha->date)),
                            "mes" => date("m",strtotime($ha->date)),
                            "anyo" => date("Y",strtotime($ha->date)),
                            "imc" => number_format((float)($ha->weigth / ($ha->heigth * $ha->heigth)),2), 
                        )
                    );
                    
                }

                

                foreach($dietes_acabades_q as $id_dieta){
                    $dieta = Diets::getDietByIdType($id_dieta->diet);

                    $historial_diets = HistorialPacient::getProgresHistorialPacient($pacient->id,$id_dieta->diet);

                    $b_historial_diets = array();
                    $b_historial_mesures_chest = array();
                    $b_historial_mesures_leg = array();
                    $b_historial_mesures_arm = array();
                    $b_historical_mesures_hip = array();

                    foreach($historial_diets as $hd){
                        array_push($b_historial_diets,
                            array(
                                "dia" => date("d",strtotime($hd->date)),
                                "mes" => date("m",strtotime($hd->date)),
                                "anyo" => date("Y",strtotime($hd->date)),
                                "imc" => number_format((float)($hd->weigth / ($hd->heigth * $hd->heigth)),2), 
                            )
                        );

                        array_push($b_historial_mesures_chest,
                            array(
                                "dia" => date("d",strtotime($hd->date)),
                                "mes" => date("m",strtotime($hd->date)),
                                "anyo" => date("Y",strtotime($hd->date)),
                                "chest" => $hd->chest, 
                            )   
                        );

                        array_push($b_historial_mesures_leg,
                            array(
                                "dia" => date("d",strtotime($hd->date)),
                                "mes" => date("m",strtotime($hd->date)),
                                "anyo" => date("Y",strtotime($hd->date)),
                                "leg" => $hd->leg, 
                            )   
                        );

                        array_push($b_historial_mesures_arm,
                            array(
                                "dia" => date("d",strtotime($hd->date)),
                                "mes" => date("m",strtotime($hd->date)),
                                "anyo" => date("Y",strtotime($hd->date)),
                                "arm" => $hd->arm,
                            )
                        );

                        array_push($b_historical_mesures_hip,
                            array(
                                "dia" => date("d",strtotime($hd->date)),
                                "mes" => date("m",strtotime($hd->date)),
                                "anyo" => date("Y",strtotime($hd->date)),
                                "hip" => $hd->hip,
                            )
                        );






                    }
                    //Per cada dieta hem de buscar els seus historials, les seves mesures (Inicials i finals)
                    

                    $arr = array(
                        "dieta" => $dieta,
                        "historial" => $b_historial_diets,
                        "chest" => $b_historial_mesures_chest,
                        "leg" => $b_historial_mesures_leg,
                        "arm" => $b_historial_mesures_arm,
                        "hip" => $b_historical_mesures_hip,

                    );

                    array_push(
                        $dietes_acabades,
                        $arr
                    );
                }   
                
                
            }

            
            return view('pacient_see',['pacient'=>$pacient,"current_diet"=>$diet,"type_diet"=>$type_diet,"historial_actual"=>$historial_actual,
                        "historial_diets"=>$historial_diets,"grafic_progres_actual"=>$grafic_progres_actual,"dietes_acabades"=>$dietes_acabades]);

        }else{
            return redirect(route("pacients"));
        }

    }else{
        return redirect(route("index"));
    }

})->name("pacient");




Route::get('/pacient_edit/{id}',function($pacient){
    
    if(Auth::check()){

        //En cas que posi la adreça i no sigui el seu pacient, no deixar entrar
        $pacient = Pacient::getPacient($pacient,Auth::user()->id);
        if($pacient != null){
            
            return view('pacient_edit',['pacient'=>$pacient]);

        }else{
            return redirect(route("pacients"));
        }

    }else{
        return redirect(route("index"));
    }


})->name("pacient_edit");


Route::get("/logout", function()
{
    Auth::logout();
    return redirect()->route("index");
})->name("logout");


Route::get('/forget_password', function()
{
    return view("forget_password");
})->name("forget_password");

Route::get('/canvia_contrasenya/{id}',function ($id){
    return view("canvia_password",["user"=>$id]);
})->name("canvia_contrasenya");


Route::get('/add_pacient', function(){
    if(Auth::check()){
        return view("add_pacient");
    }

    
})->name("view_add_pacient");



Route::get("/dietes", function(){

    if(Auth::check()){

        $diets = Diets::getAllDietsTypeDiets();
        $type_diets = TypeDiets::getAllTypes();

        return view("diets",["diets"=>$diets,"type_diets"=>$type_diets]);

    }else{
        return redirect(route("index"));
    }

})->name("dietes");


Route::get("/dieta/{id}", function($dieta){

    if(Auth::check()){


    }else{
        return redirect(route("index"));
    }


})->name("dieta");


Route::get('/add_dieta', function(){


    if(Auth::check()){

        
        $tipus_dieta = TypeDiets::getAllTypes();


        return view("add_dieta",["tipus_dietes"=>$tipus_dieta]);

    }else{
        return redirect(route("index"));
    }

    
})->name("view_add_pacient");




Route::post("user/login", [UserController::class, "login"])->name("user.login");
Route::post("user/recupera_password", [UserController::class, "recupera_password"])->name("user.recupera_password");
Route::post("user/canvia_contrasenya",[UserController::class, "canvia_contrasenya"])->name("user.canvia_contrasenya");
Route::post("pacient/filtrar_pacient",[PacientController::class, "filtrar_pacient"])->name("pacient.filtrar_pacient");
Route::post("pacient/filtrar_all_pacients",[PacientController::class, "filtrar_all_pacients"])->name("pacient.filtrar_all_pacients");
Route::post("pacient/add_pacient",[PacientController::class, "add_pacient"])->name("pacient.add");
Route::post("pacient/edit_pacient",[PacientController::class, "edit_pacient"])->name("pacient.edit");
Route::post("diet/filtrar_all_diets",[DietController::class, "filtrar_all_diets"])->name("diet.filtrar_all_diets");
Route::post("diet/filtrar",[DietController::class, "filtrar_dieta"])->name("diet.filtrar");
