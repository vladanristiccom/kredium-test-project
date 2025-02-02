<?php

use App\Http\Controllers\CashLoanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeLoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\CheckLoanOwnership;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('clients', ClientController::class);
    Route::middleware([CheckLoanOwnership::class])->group(function () {
        Route::get('home-loans/{client}/edit', [HomeLoanController::class, 'edit'])->name('home_loan.edit');
        Route::put('home-loans/{client}/update', [HomeLoanController::class, 'update'])->name('home_loan.update');

        Route::get('cash-loans/{client}/edit', [CashLoanController::class, 'edit'])->name('cash_loan.edit');
        Route::put('cash-loans/{client}/update', [CashLoanController::class, 'update'])->name('cash_loan.update');
    });
    Route::get('reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('reports/export', [ReportController::class, 'export'])->name('report.export');
});

require __DIR__.'/auth.php';
