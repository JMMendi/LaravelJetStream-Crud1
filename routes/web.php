<?php

use App\Livewire\Prueba;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Aquí pondremos todas las rutas que necesiten logearse
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('prueba', Prueba::class)->name('prueba');
});

