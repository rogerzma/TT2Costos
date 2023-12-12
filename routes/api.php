<?php

use App\Http\Controllers\appControlador;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\reporteControlador;
use App\Http\Controllers\cultivoControlador;
use App\Http\Controllers\CalculadoraControlador;
use App\Http\Controllers\reporteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\CustomRegisterController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/reporte')->group(function(){
    Route::get('/reportes', [reporteControlador::class, 'get']);
    
    
});


Route::get('/subir-reportes', [reporteControlador::class, 'get'])->name('subir.reportes');
Route::get('/cultivo', [appControlador::class, 'getCultivos']);
Route::get('/descargar-pdf/{id}', [PDFController::class, 'descargarPDF'])->name('descargar.pdf');
Route::post('/crear-reporte', [reporteControlador::class, 'create'])->name('crear.reporte');
Route::put('/actualiza-reporte', [reporteControlador::class, 'update'])->name('actualiza.reporte');
Route::put('/actualiza-cultivo', [cultivoControlador::class, 'update'])->name('actualiza.cultivo');
Route::delete('/eliminar-reporte/{id}', [reporteControlador::class, 'delete'])->name('eliminar.reporte');
Route::get('/editar-reporte/{id}', [reporteControlador::class, 'edit'])->name('editar.reporte');
Route::get('/editar-cultivo/{id}', [cultivoControlador::class, 'edit'])->name('editar.cultivo');
Route::get('/lista-cultivos', [cultivoControlador::class, 'get'])->name('lista.cultivos');
Route::post('/crear-cultivo', [cultivoControlador::class, 'create'])->name('crear.cultivo');
Route::post('/guardar-cultivo', [cultivoControlador::class, 'store'])->name('guardar.cultivo');
Route::post('/crear-costo', [cultivoControlador::class, 'createCosto'])->name('crear.costo');
Route::post('/calcular-costo', [CalculadoraControlador::class, 'index'])->name('calcular.costo');
Route::post('/registrar-usuario', [CustomRegisterController::class, 'registrarUsuario'])->name('registrar.usuario');
Route::delete('/eliminar-cultivo/{id}', [cultivoControlador::class, 'delete'])->name('eliminar.cultivo');
Route::match(['get', 'post'], '/crear-pdf', [CalculadoraControlador::class, 'pdf'])->name('crear.pdf');

