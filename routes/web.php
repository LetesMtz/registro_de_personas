<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\DetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CreateController::class, 'index']);

Route::post('/crear', [CreateController::class, 'store'])->name('crear');

Route::get('/detalles/{id}', [DetailsController::class, 'index'])->name('detalles');

Route::post('/detalles/actualizar/{id}', [DetailsController::class, 'update'])->name('detallesUpdate');

Route::get('/detalles/eliminar/{id}', [DetailsController::class, 'destroy'])->name('detallesDestroy');
