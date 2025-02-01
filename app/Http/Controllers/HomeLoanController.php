<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClientHomeLoanRequest;
use App\Models\Client;
use App\Models\HomeLoan;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;

class HomeLoanController extends Controller
{

    /**
     * @param Client $client
     * @return Closure|Container|mixed|object|null
     */
    public function edit(Client $client)
    {
        return view('home_loans.edit', ['client' => $client->load('homeLoan'), 'homeLoan' => $client->homeLoan]);
    }

    /**
     * @param Client $client
     * @param UpdateClientHomeLoanRequest $updateClientHomeLoanRequest
     * @return Closure|Container|mixed|object|null
     */
    public function update(Client $client, UpdateClientHomeLoanRequest $updateClientHomeLoanRequest)
    {
        $homeLoan = $client->homeLoan()->updateOrCreate(
            [
                'id' => $updateClientHomeLoanRequest->input('home_loan_id')
            ],
            [
                HomeLoan::ADVISOR_ID => Auth::id(),
                HomeLoan::DOWN_PAYMENT_AMOUNT => $updateClientHomeLoanRequest->input('down_payment_amount'),
                HomeLoan::PROPERTY_VALUE => $updateClientHomeLoanRequest->input('property_value')
            ]
        );

        if($homeLoan->wasRecentlyCreated) {
            $client->{Client::HOME_LOAN_ID} = $homeLoan->id;
            $client->save();
        }

        return redirect()->route('home-loan.edit', ['client' => $client->refresh()])
                         ->with('success', 'Client home loan updated successfully!');
    }

}
