<?php

namespace App\Providers;

use App\Http\Controllers\CashLoanController;
use App\Http\Controllers\HomeLoanController;
use App\Repositories\CashLoanRepositoryImpl;
use App\Repositories\HomeLoanRepositoryImpl;
use App\Repositories\ILoanRepo;
use App\Repositories\IReportRepo;
use App\Repositories\ReportRepoImpl;
use App\Services\IReportService;
use App\Services\ReportServiceImpl;
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

        $this->app->singleton(IReportRepo::class, ReportRepoImpl::class);
        $this->app->singleton(IReportService::class, ReportServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
