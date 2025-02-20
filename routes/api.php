<?php

use App\Http\Controllers\FichaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/fichas', [FichaController::class, 'index']); // Listar fichas
    Route::post('/fichas', [FichaController::class, 'store']); // Crear ficha
    Route::get('/fichas/{ficha}', [FichaController::class, 'show']); // Ver ficha
    Route::put('/fichas/{ficha}', [FichaController::class, 'update']); // Editar ficha
    Route::delete('/fichas/{ficha}', [FichaController::class, 'destroy']); // Eliminar ficha
});
