<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovimientoController;




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



// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta del Dashboard protegida
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [MovimientoController::class, 'index'])->name('dashboard');
    Route::resource('movimientos', MovimientoController::class)->except(['index']);
    Route::resource('movimientos', MovimientoController::class);
    Route::get('/dashboard/movimientos/{movimiento}/edit', [MovimientoController::class, 'edit'])->name('movimientos.edit');
    Route::put('/dashboard/movimientos/{movimiento}', [MovimientoController::class, 'update'])->name('movimientos.update'); 
   
});




