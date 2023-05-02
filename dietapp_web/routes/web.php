<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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


Route::post("user/login", [UserController::class, "login"])->name("user.login");
Route::post("user/recupera_password", [UserController::class, "recupera_password"])->name("user.recupera_password");
Route::post("user/canvia_contrasenya",[UserController::class, "canvia_contrasenya"])->name("user.canvia_contrasenya");


