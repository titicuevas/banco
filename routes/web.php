<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('clientes',ClienteController::class);

Route::resource('cuentas',CuentaController::class);

Route::get('/cuentas/{cuenta}/addmovimiento', [CuentaController::class, 'addmovimiento'])
        ->name('cuentas.addmovimiento');

    Route::post('/cuentas/{cuenta}', [CuentaController::class, 'addmovimientostore'])
        ->name('cuentas.addmovimiento.store');

    Route::get('/cuentas/{cuenta}/movimientos', [CuentaController::class, 'movimientos'])
        ->name('cuentas.movimientos');

    Route::delete('/cuentas/{cuenta}/movimientos/{movimiento}', [CuentaController::class, 'deleteMovimiento'])
        ->name('cuentas.movimientos.delete');

require __DIR__.'/auth.php';
