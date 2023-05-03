<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PacientController;

use App\Models\Pacient;
use App\Models\Diets;

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
            
            return view('pacient_see',['pacient'=>$pacient]);

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


Route::post("user/login", [UserController::class, "login"])->name("user.login");
Route::post("user/recupera_password", [UserController::class, "recupera_password"])->name("user.recupera_password");
Route::post("user/canvia_contrasenya",[UserController::class, "canvia_contrasenya"])->name("user.canvia_contrasenya");
Route::post("pacient/filtrar_pacient",[PacientController::class, "filtrar_pacient"])->name("pacient.filtrar_pacient");
Route::post("pacient/filtrar_all_pacients",[PacientController::class, "filtrar_all_pacients"])->name("pacient.filtrar_all_pacients");
Route::post("pacient/add_pacient",[PacientController::class, "add_pacient"])->name("pacient.add");

