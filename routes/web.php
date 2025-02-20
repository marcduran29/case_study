<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FichaController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/fichas', [FichaController::class, 'index']);
    Route::post('/fichas', [FichaController::class, 'store']);
});
