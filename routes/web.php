<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/crear-cliente', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/editar-cliente/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
    Route::get('/crear-vehiculo', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('/crear-vehiculo', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::get('/editar-vehiculo/{vehiculo}', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::put('/editar-vehiculo/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('/vehiculo/{vehiculo}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');

    Route::get('/solicitud', []);
});

require __DIR__ . '/auth.php';
