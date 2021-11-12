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
    return view('pages.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/ingresos', [App\Http\Controllers\IngresosController::class, 'all'])->name('ingresos.all');

Route::get('/registrar-ingresos', [App\Http\Controllers\IngresosController::class, 'index'])->name('ingresos.index');
Route::post('/ingresos_store', [App\Http\Controllers\IngresosController::class, 'store'])->name('ingresos.store');


require __DIR__.'/auth.php';
