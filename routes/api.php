<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\AuthController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//////////////////////// Rutas públicas ///////////////////////////////////////
//Route::resource('/propiedades', PropiedadController::class);
Route::post('/logup',[AuthController::class,'registro']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/propiedades',[PropiedadController::class,'index']);
Route::get('/propiedades/{id}',[PropiedadController::class,'show']);
Route::get('/propiedades/search/{name}',[PropiedadController::class,'search']);
Route::get('/propiedades/searchbycategory/{categoria}',[PropiedadController::class,'searchbycategory']);

//////////////////////// Rutas protegidas ///////////////////////////////////////
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/propiedades',[PropiedadController::class,'store']);
    Route::put('/propiedades/{id}',[PropiedadController::class,'update']);
    Route::delete('/propiedades/{id}', [PropiedadController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});