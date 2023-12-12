<?php

use App\Http\Controllers\appControlador;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\reporteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\reporteControlador;
use App\Http\Controllers\cultivoControlador;
use App\Http\Controllers\CalculadoraControlador;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomRegisterController;




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
Route::get('/Calculadora', [CalculadoraControlador::class, 'calculadoraDatos'])->name('Calculadora');
Route::view('/MapaPotencial', 'MapaPotencial')->name('MapaPotencial');
Route::view('/pruebaCultivo', 'pruebaCultivo')->name('pruebaCultivo');
Route::view('/pruebaCultivo2', 'pruebaCultivo2')->name('pruebaCultivo2');
Route::view('/InicioAdministrador', 'InicioAdministrador')->name('InicioAdministrador');
Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/prueba', 'prueba')->name('prueba');
Route::get('/filtrado', [ReporteControlador::class, 'getFiltrado'])->name('filtrado');
Route::get('/CalculadoraResultado', [CalculadoraControlador::class, 'calcularCostos'])->name('CalculadoraResultado');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/SubirReportes', [reporteControlador::class, 'get'])->name('SubirReportes');
    Route::get('/ListaCultivos', [cultivoControlador::class, 'get'])->name('ListaCultivos');
    Route::view('/RegistrarCultivo', 'RegistrarCultivo')->name('RegistrarCultivo');
    Route::view('/RegistrarUsuario', 'RegistrarUsuario')->name('RegistrarUsuario');
    Route::view('/CreaReporte', 'CreaReporte')->name('CreaReporte');
    Route::post('/registrar-usuario', [CustomRegisterController::class, 'registrarUsuario'])->name('registrar.usuario');

});






