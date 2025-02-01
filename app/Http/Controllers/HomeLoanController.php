<?php

namespace App\Http\Controllers;

use App\DTOs\HomeLoanDTO;
use App\Http\Requests\UpdateClientHomeLoanRequest;
use App\Models\Client;
use App\Repositories\IHomeLoanRepository;
use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;

class HomeLoanController extends Controller
{

    private IHomeLoanRepository $homeLoanRepository;

    public function __construct(IHomeLoanRepository $homeLoanRepository)
    {
        $this->homeLoanRepository = $homeLoanRepository;
    }

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
        // can be moved to repo layer
        $this->homeLoanRepository->updateClientHomeLoan(
            client: $client,
            homeLoanDTO: new HomeLoanDTO(
                id: $updateClientHomeLoanRequest->input('home_loan_id'),
                downPaymentAmount: $updateClientHomeLoanRequest->input('down_payment_amount'),
                propertyValue: $updateClientHomeLoanRequest->input('property_value'),
                advisorId: Auth::id()
            )
        );

        return redirect()->route('home-loan.edit', ['client' => $client->refresh()])
                         ->with('success', 'Client home loan updated successfully!');
    }

}
