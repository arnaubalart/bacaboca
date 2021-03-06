<?php

use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});


Route::post('filtro',[RestauranteController::class, 'filtroController']);//FILTRO
/*LogIn y LogOut*/
Route::get('login',[RestauranteController::class, 'login']);

Route::post('login',[RestauranteController::class, 'loginPost']);

Route::get('logout',[RestauranteController::class, 'logout']);

/*Crear*/
Route::get('/crear',[RestauranteController::class, 'crearRestaurante']);

Route::post('/crear',[RestauranteController::class, 'crearRestaurantePost']);

/*Mostrar*/
Route::get('mostrar',[RestauranteController::class, 'mostrarRestaurante']);

/*Eliminar*/
Route::delete('/eliminarRestaurante/{id}', [RestauranteController::class, 'eliminarRestaurante']);

/*Actualizar*/
Route::get('/modificarRestaurante/{id}', [RestauranteController::class, 'modificarRestaurante']);

Route::put('/modificarRestaurante',[RestauranteController::class, 'modificarRestaurantePut']);


/*Ficha restaurante*/
Route::get('/fichaRestaurante/{id}', [RestauranteController::class, 'fichaRestaurante']);

/*Crear review*/
Route::post('/creaReview', [RestauranteController::class, 'creaReview']);


/*------------------Usuarios------------------*/
/*Crear*/
Route::get('/crearUser',[UsuarioController::class, 'crearUsuario']);

Route::post('/crearUser',[UsuarioController::class, 'crearUsuarioPost']);

/*Mostrar*/
Route::get('mostrarUser',[UsuarioController::class, 'mostrarUsuario']);

/*Eliminar*/
Route::delete('/eliminarUsuario/{id}', [UsuarioController::class, 'eliminarUsuario']);