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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/ingresos', [App\Http\Controllers\IngresosController::class, 'all'])->name('ingresos.all');
Route::get('/navieras', [App\Http\Controllers\NavierasController::class, 'index'])->name('navieras.index');
Route::get('/buques', [App\Http\Controllers\BuquesController::class, 'index'])->name('buques.index');
Route::get('/contenedores', [App\Http\Controllers\ContenedoresController::class, 'index'])->name('contenedores.index');

Route::get('/registrar-ingresos', [App\Http\Controllers\IngresosController::class, 'index'])->name('ingresos.index');
Route::post('/ingresos_store', [App\Http\Controllers\IngresosController::class, 'store'])->name('ingresos.store');


//Cliente
Route::get('/consultar', [App\Http\Controllers\ConsultaController::class, 'index'])->name('consultar.index');
Route::post('/consultar-retenido', [App\Http\Controllers\ConsultaController::class, 'consulta'])->name('consultar.retenido');

require __DIR__.'/auth.php';
