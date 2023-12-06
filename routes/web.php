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
Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/prueba', 'prueba')->name('prueba');


Route::middleware(['restrictAccess'])->group(function () {
    // Rutas restringidas
    Route::get('/RegistrarCultivo', 'TuControlador@metodoRegistrarCultivo')->name('RegistrarCultivo');
    Route::get('/InicioAdministrador', 'TuControlador@metodoInicioAdministrador')->name('InicioAdministrador');
    Route::get('/SubirReportes', 'TuControlador@metodoSubirReportes')->name('SubirReportes');
    Route::get('/ListaCultivos', 'TuControlador@metodoListaCultivos')->name('ListaCultivos');
    Route::get('/ActualizaCultivo', 'TuControlador@metodoActualizaCultivo')->name('ActualizaCultivo');
    Route::get('/ActualizaReporte', 'TuControlador@metodoActualizaReporte')->name('ActualizaReporte');
    Route::get('/CreaReporte', 'TuControlador@metodoCreaReporte')->name('CreaReporte');
});
