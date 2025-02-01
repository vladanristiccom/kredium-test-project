<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\IReportRepo;
use Illuminate\Support\Carbon;

class ReportServiceImpl implements IReportService
{

    private IReportRepo $reportRepo;

    public function __construct(IReportRepo $reportRepo)
    {
        $this->reportRepo = $reportRepo;
    }

    public function generateCSVReport(User $user, ?Carbon $from = null, ?Carbon $to = null, ?bool $today = false): string
    {
        $loans = $this->reportRepo->getAdvisorReportData($user, $from, $to, $today);
        $csvHeader = implode(',', ['Product Type', 'Product Value', 'Creation Date']);
        $csvData = $loans->map(function ($loan) {
            return implode(',', [
                $loan['product_type'],
                $loan['product_value'],
                $loan['created_at']
            ]);
        })->toArray();

        array_unshift($csvData, $csvHeader);

        return implode("\n", $csvData);
    }
}
