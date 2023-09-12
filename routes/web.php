<?php

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
    return view('welcome');
});

Auth::routes();

Route::view('/index', 'index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', function () {return view('index');});
Route::view('/Calculadora', 'Calculadora')->name('calculadora');
Route::view('/MapaPotencial', 'MapaPotencial')->name('MapaPotencial');
Route::view('/RegistrarCultivo', 'RegistrarCultivo')->name('RegistrarCultivo');
Route::view('/InicioAdministrador', 'InicioAdministrador')->name('InicioAdministrador');
