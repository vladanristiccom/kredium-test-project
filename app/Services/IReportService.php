<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Carbon;

interface IReportService
{
    public function generateCSVReport(User $user, ?Carbon $from = null, ?Carbon $to = null, ?bool $today = false): string;
}
