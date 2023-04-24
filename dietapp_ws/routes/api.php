<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DietController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login',[UserController::class,'login']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/user/{id}', [UserController::class,'getUser']);
    Route::get('/diets', [DietController::class, 'getDiets']);
    Route::get('/dishes/{dieta}',[DietController::class, 'getDishes']);
    Route::get('/historial/{usuari}',[DietController::class, 'getHistorialPacient']);
    Route::get('/ingredientsdish/{dish}',[DietController::class, 'getIngredients']);
    Route::get('/pacient/{id}',[UserController::class, 'getPacient']);
});
