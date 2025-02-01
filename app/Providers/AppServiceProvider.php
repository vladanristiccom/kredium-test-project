<?php

namespace App\Providers;

use App\Http\Controllers\CashLoanController;
use App\Http\Controllers\HomeLoanController;
use App\Repositories\CashLoanRepositoryImpl;
use App\Repositories\HomeLoanRepositoryImpl;
use App\Repositories\ILoanRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(HomeLoanController::class)
                  ->needs(ILoanRepo::class)
                  ->give(HomeLoanRepositoryImpl::class);

        $this->app->when(CashLoanController::class)
                  ->needs(ILoanRepo::class)
                  ->give(CashLoanRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
