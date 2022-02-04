<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*LogIn y LogOut*/
Route::get('',[RestauranteController::class, 'login']);

Route::post('login',[RestauranteController::class, 'loginPost']);

Route::get('logout',[RestauranteController::class, 'logout']);

/*Crear*/
Route::get('/crear',[RestauranteController::class, 'crearRestaurante']);

Route::post('/crear',[RestauranteController::class, 'crearRestaurantePost']);

/*Mostrar*/
Route::get('/mostrar',[RestauranteController::class, 'mostrarRestaurante']);

/*Eliminar*/
Route::delete('/eliminarRestaurante/{id}', [RestauranteController::class, 'eliminarRestaurante']);