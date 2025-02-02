<?php

namespace App\Repositories;

use App\DTOs\ALoanDTO;
use App\DTOs\HomeLoanDTO;
use App\Models\Client;
use App\Models\HomeLoan;

class HomeLoanRepositoryImpl implements ILoanRepo
{
    public function updateClientLoan(Client $client, HomeLoanDTO|ALoanDTO $loanDTO): HomeLoan
    {
        $homeLoan = $client->homeLoan()->updateOrCreate(
            [
                'id' => $loanDTO->getId()
            ],
            [
                HomeLoan::ADVISOR_ID => $loanDTO->getAdvisorId(),
                HomeLoan::DOWN_PAYMENT_AMOUNT => $loanDTO->getDownPaymentAmount(),
                HomeLoan::PROPERTY_VALUE => $loanDTO->getPropertyValue()
            ]
        );

        if($homeLoan->wasRecentlyCreated) {
            $client->{Client::HOME_LOAN_ID} = $homeLoan->id;
            $client->save();
        }

        return $homeLoan;
    }
}
