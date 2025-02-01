<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

interface IReportRepo
{
    public function getAdvisorReportData(User $user, ?Carbon $from = null, ?Carbon $to = null, ?bool $today = false): Collection;
}
