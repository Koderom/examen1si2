<?php

use App\Http\Controllers\AbogadoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ExpedienteJudicialController;
use App\Http\Controllers\JuezController;
use App\Http\Controllers\JuzgadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProcesoJudicialController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\UserController;
use App\Models\ProcesoJudicial;
use Illuminate\Support\Facades\Auth;
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

Route::view('/','Bienvenido')->name('bienvenido');

Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('home','layouts.Inicio')->name('home')->middleware('auth');

Route::post('/login',[LoginController::class,'login']);
Route::put('/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::controller(SuscripcionController::class)->group(function(){
    Route::get('registro/{plan}','registro')->name('registro');    
    Route::post('registro/store/{plan}','store')->name('registro.store');    
});
Route::controller(UserController::class)->group(function(){
    Route::get('user/index','index')->name('user.index');
    Route::get('user/create','create')->name('user.create');
    Route::post('user/store','store')->name('user.store');
    Route::delete('user/{user}','destroy')->name('user.destroy');
    Route::get('user/{user}/edit','edit')->name('user.edit');
    Route::put('user/{user}','update')->name('user.update');
});
Route::controller(JuzgadoController::class)->group(function(){
    Route::get('juzgado/index','index')->name('juzgado.index');
    Route::get('juzgado/create','create')->name('juzgado.create');
    Route::post('juzgado/store','store')->name('juzgado.store');
    Route::delete('juzgado/{juzgado}','destroy')->name('juzgado.destroy');
    Route::get('juzgado/{juzgado}/edit','edit')->name('juzgado.edit');
    Route::put('juzgado/{juzgado}','update')->name('juzgado.update');
});
Route::controller(JuezController::class)->group(function(){
    Route::get('juez/index','index')->name('juez.index');
    Route::get('juez/create','create')->name('juez.create');
    Route::post('juez/store','store')->name('juez.store');
    Route::delete('juez/{juez}','destroy')->name('juez.destroy');
    Route::get('juez/{juez}/edit','edit')->name('juez.edit');
    Route::put('juez/{juez}','update')->name('juez.update');
    Route::get('juez/{juez}/show','show')->name('juez.show');
});
Route::controller(AbogadoController::class)->group(function(){
    Route::get('abogado/index','index')->name('abogado.index');
    Route::get('abogado/create','create')->name('abogado.create');
    Route::post('abogado/store','store')->name('abogado.store');
    Route::delete('abogado/{abogado}','destroy')->name('abogado.destroy');
    Route::get('abogado/{abogado}/edit','edit')->name('abogado.edit');
    Route::put('abogado/{abogado}','update')->name('abogado.update');
    Route::get('abogado/{abogado}/show','show')->name('abogado.show');
});
Route::controller(PersonaController::class)->group(function(){
    Route::get('persona/index','index')->name('persona.index');
    Route::get('persona/create','create')->name('persona.create');
    Route::post('persona/store','store')->name('persona.store');
    Route::delete('persona/{persona}','destroy')->name('persona.destroy');
    Route::get('persona/{persona}/edit','edit')->name('persona.edit');
    Route::put('persona/{persona}','update')->name('persona.update');
    Route::get('persona/{persona}/show','show')->name('persona.show');
});
//<-
Route::controller(ProcesoJudicialController::class)->group(function(){
    Route::get('procesoJudicial/index','index')->name('procesoJudicial.index');
    Route::get('procesoJudicial/create','create')->name('procesoJudicial.create');
    Route::post('procesoJudicial/store','store')->name('procesoJudicial.store');
    Route::delete('procesoJudicial/{procesoJudicial}','destroy')->name('procesoJudicial.destroy');
    Route::get('procesoJudicial/{procesoJudicial}/edit','edit')->name('procesoJudicial.edit');
    Route::put('procesoJudicial/{procesoJudicial}','update')->name('procesoJudicial.update');
    Route::get('procesoJudicial/{procesoJudicial}/show','show')->name('procesoJudicial.show');
});
Route::controller(ExpedienteJudicialController::class)->group(function(){
    Route::get('expedienteJudicial/{procesoJudicial}/index','index')->name('expedienteJudicial.index');
    Route::get('expedienteJudicial/{procesoJudicial}/create','create')->name('expedienteJudicial.create');
    Route::post('expedienteJudicial/store','store')->name('expedienteJudicial.store');
    Route::delete('expedienteJudicial/{expedienteJudicial}','destroy')->name('expedienteJudicial.destroy');
    Route::get('expedienteJudicial/{expedienteJudicial}/edit','edit')->name('expedienteJudicial.edit');
    Route::put('expedienteJudicial/{expedienteJudicial}','update')->name('expedienteJudicial.update');
    Route::get('expedienteJudicial/{expedienteJudicial}/show','show')->name('expedienteJudicial.show');
});
Route::controller(ArchivoController::class)->group(function(){
    Route::get('archivo/index','index')->name('archivo.index');
    Route::get('archivo/{expedienteJudicial}/create','create')->name('archivo.create');
    Route::post('archivo/store','store')->name('archivo.store');
    Route::delete('archivo/{archivo}','destroy')->name('archivo.destroy');
    Route::get('archivo/{archivo}/edit','edit')->name('archivo.edit');
    Route::put('archivo/{archivo}','update')->name('archivo.update');
    Route::get('archivo/{archivo}/show','show')->name('archivo.show');
});
Route::controller(BitacoraController::class)->group(function(){
    Route::get('bitacora/index','index')->name('bitacora.index');
});

