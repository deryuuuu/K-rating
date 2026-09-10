<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminCarController;

// Route Katalog Utama (Guest)
Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

// Route Kelola Admin (Wajib Login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Ubah CarController@adminIndex menjadi AdminCarController@index
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');
});

require __DIR__.'/auth.php';