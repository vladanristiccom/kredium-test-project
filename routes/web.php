<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeLoanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('clients', ClientController::class);
    Route::get('home-loans/{client}/edit', [HomeLoanController::class, 'edit'])->name('home-loan.edit');
    Route::put('home-loans/{client}/update', [HomeLoanController::class, 'update'])->name('home-loan.update');
});

Route::get('reports', [ClientController::class, 'index'])->name('report.index');
require __DIR__.'/auth.php';
