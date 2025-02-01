<?php

namespace App\Repositories;

use App\DTOs\HomeLoanDTO;
use App\Models\Client;
use App\Models\HomeLoan;

interface IHomeLoanRepository
{
    public function updateClientHomeLoan(Client $client, HomeLoanDTO $homeLoanDTO): HomeLoan;
}
