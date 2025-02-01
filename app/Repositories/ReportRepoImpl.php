<?php

namespace App\Repositories;

use App\Models\CashLoan;
use App\Models\HomeLoan;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class ReportRepoImpl implements IReportRepo
{

    public function getAdvisorReportData(User $user, ?Carbon $from = null, ?Carbon $to = null, ?bool $today = false): Collection
    {
        $query = CashLoan::where(CashLoan::ADVISOR_ID, $user->id);
        $this->applyDateFilters($query, $from, $to, $today);
        $cashLoans = $query->get()->map(function ($loan) {
            return [
                'product_type' => 'Cash Loan',
                'product_value' => $loan->{CashLoan::LOAN_AMOUNT},
                'created_at' => $loan->created_at,
            ];
        });

        $query = HomeLoan::where(CashLoan::ADVISOR_ID, $user->id);
        $this->applyDateFilters($query, $from, $to, $today);
        $homeLoans = $query->get()->map(function ($loan) {
            return [
                'product_type' => 'Home Loan',
                HomeLoan::PROPERTY_VALUE => $loan->{HomeLoan::PROPERTY_VALUE},
                'product_value' => $loan->{HomeLoan::PROPERTY_VALUE} - $loan->{HomeLoan::DOWN_PAYMENT_AMOUNT},
                'created_at' => $loan->created_at,
            ];
        });

        return $cashLoans->merge($homeLoans)->sortByDesc('created_at');
    }

    private function applyDateFilters($query, ?Carbon $from = null, ?Carbon $to = null, bool $today)
    {
        if ($today) {
            $query->whereDate('created_at', Carbon::today());
        } else {
            $query->whereBetween('created_at', [$from->startOfDay(), $to->endOfDay()]);
        }
    }

}
