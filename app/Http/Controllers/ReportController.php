<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\IReportRepo;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private IReportRepo $reportRepo;

    public function __construct(IReportRepo $reportRepo)
    {
        $this->reportRepo = $reportRepo;
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
}
