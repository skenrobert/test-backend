<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/datauser', [AuthController::class, 'dataUser'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::ApiResource('users', 'App\Http\Controllers\User\UserController');
    Route::get('estatus/{user}', 'App\Http\Controllers\User\UserController@estatus'); 
    
    Route::ApiResource('personas', 'App\Http\Controllers\Testbackend\PersonaController');
    Route::ApiResource('clientes', 'App\Http\Controllers\Testbackend\ClienteController');
    Route::ApiResource('factulineas', 'App\Http\Controllers\Testbackend\FactulineaController');
    Route::ApiResource('formulas', 'App\Http\Controllers\Testbackend\FormulaController');
    Route::ApiResource('productos', 'App\Http\Controllers\Testbackend\ProductoController');
    Route::ApiResource('tipofacturaciones', 'App\Http\Controllers\Testbackend\TipoFacturacioneController');
    Route::ApiResource('tipoidentificaciones', 'App\Http\Controllers\Testbackend\TipoidentificacioneController');
});

