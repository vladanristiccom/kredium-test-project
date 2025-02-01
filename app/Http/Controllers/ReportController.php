<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\IReportRepo;
use App\Services\IReportService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    private IReportRepo $reportRepo;

    private IReportService $reportService;

    public function __construct(IReportRepo $reportRepo, IReportService $reportService)
    {
        $this->reportRepo = $reportRepo;
        $this->reportService = $reportService;
    }

    public function index()
    {
        return view('reports.index',
                    [
                        'loans' => $this->reportRepo->getAdvisorReportData(
                            user: User::findOrFail(Auth::id()),
                            today: true
                        )
                    ]
        );
    }

    public function export(): \Illuminate\Http\Response
    {
        return Response::make($this->reportService->generateCSVReport(
            user: User::findOrFail(Auth::id()),
            today: true
        ), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="end_of_day_loans_report.csv"',
        ]);
    }

}
