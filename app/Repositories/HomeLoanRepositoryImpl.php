<?php

namespace App\Repositories;

use App\DTOs\HomeLoanDTO;
use App\Models\Client;
use App\Models\HomeLoan;
use App\Repositories\IHomeLoanRepository;
use Illuminate\Support\Facades\Auth;

class HomeLoanRepositoryImpl implements IHomeLoanRepository
{

    public function updateClientHomeLoan(Client $client, HomeLoanDTO $homeLoanDTO): HomeLoan
    {
        $homeLoan = $client->homeLoan()->updateOrCreate(
            [
                'id' => $homeLoanDTO->getId()
            ],
            [
                HomeLoan::ADVISOR_ID => $homeLoanDTO->getAdvisorId(),
                HomeLoan::DOWN_PAYMENT_AMOUNT => $homeLoanDTO->getDownPaymentAmount(),
                HomeLoan::PROPERTY_VALUE => $homeLoanDTO->getPropertyValue()
            ]
        );

        if($homeLoan->wasRecentlyCreated) {
            $client->{Client::HOME_LOAN_ID} = $homeLoan->id;
            $client->save();
        }

        return $homeLoan;
    }
}
