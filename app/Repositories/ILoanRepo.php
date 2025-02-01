<?php

namespace App\Repositories;

use App\DTOs\ALoanDTO;
use App\Models\CashLoan;
use App\Models\Client;
use App\Models\HomeLoan;

interface ILoanRepo
{
    public function updateClientLoan(Client $client, ALoanDTO $loanDTO): HomeLoan|CashLoan;
}
