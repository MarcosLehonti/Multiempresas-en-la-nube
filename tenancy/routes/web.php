<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Nuevas rutas para vistas adicionales
Route::get('/inicio', function () {
    return view('welcome'); // Asegúrate de que este archivo exista en resources/views/
});

//Ruta para mostrar los precios de las suscripciones
Route::get('/precio', function () {
    return view('precio'); // Asegúrate de que este archivo exista en resources/views/
});

// //Ruta para mostrar los usuarios del sistema
// Route::get('/users', [UserController::class, 'index'])->name('users.index');


//Rutas restfull para mostrar los usuarios
Route::resource('users', UserController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tenants',TenantController::class)->except(['show']);
});


require __DIR__.'/auth.php';
