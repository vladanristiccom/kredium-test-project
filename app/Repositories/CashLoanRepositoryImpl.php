<?php

namespace App\Repositories;

use App\DTOs\ALoanDTO;
use App\DTOs\CashLoanDTO;
use App\Models\CashLoan;
use App\Models\Client;

class CashLoanRepositoryImpl implements ILoanRepo
{

    public function updateClientLoan(Client $client, ALoanDTO|CashLoanDTO $loanDTO): CashLoan
    {
        $cashLoan = $client->cashLoan()->updateOrCreate(
            [
                'id' => $loanDTO->getId()
            ],
            [
                CashLoan::ADVISOR_ID => $loanDTO->getAdvisorId(),
                CashLoan::LOAN_AMOUNT => $loanDTO->getLoanAmount(),
            ]
        );

        if($cashLoan->wasRecentlyCreated) {
            $client->{Client::CASH_LOAN_ID} = $cashLoan->id;
            $client->save();
        }

        return $cashLoan;
    }
}
