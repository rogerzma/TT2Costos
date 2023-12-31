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
Route::view('/Inicio', 'Inicio')->name('inicio');
Route::view('/Header', 'Header')->name('Header');
Route::view('/Calculadora', 'Calculadora')->name('calculadora');
Route::view('/MapaPotencial', 'MapaPotencial')->name('MapaPotencial');
Route::view('/filtrado', 'filtrado')->name('filtrado');
Route::view('/RegistrarCultivo', 'RegistrarCultivo')->name('RegistrarCultivo');
Route::view('/InicioAdministrador', 'InicioAdministrador')->name('InicioAdministrador');
Route::view('/SubirReportes', 'SubirReportes')->name('SubirReportes');
Route::view('/ListaCultivos', 'ListaCultivos')->name('ListaCultivos');
Route::view('/ActualizaCultivo', 'ActualizaCultivo')->name('ActualizaCultivo');
Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/ActualizaReporte', 'ActualizaReporte')->name('ActualizaReporte');
Route::view('/CreaReporte', 'CreaReporte')->name('CreaReporte');
Route::view('/prueba', 'prueba')->name('prueba');


