<?php

namespace App\Http\Controllers;

use App\DTOs\CashLoanDTO;
use App\Http\Requests\UpdateClientCashLoanRequest;
use App\Models\Client;
use App\Repositories\ILoanRepo;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;

class CashLoanController extends Controller
{

    private ILoanRepo $loanRepo;

    public function __construct(ILoanRepo $loanRepo)
    {
        $this->loanRepo = $loanRepo;
    }

    /**
     * @param Client $client
     * @return Closure|Container|mixed|object|null
     */
    public function edit(Client $client)
    {
        return view('cash_loans.edit', ['client' => $client->load('cashLoan'), 'cashLoan' => $client->cashLoan]);
    }

    /**
     * @param Client $client
     * @param UpdateClientCashLoanRequest $updateClientCashLoanRequest
     * @return mixed
     */
    public function update(Client $client, UpdateClientCashLoanRequest $updateClientCashLoanRequest)
    {
        $this->loanRepo->updateClientLoan(
            client: $client,
            loanDTO: new CashLoanDTO(
                        id: $updateClientCashLoanRequest->input('cash_loan_id'),
                        loanAmount: $updateClientCashLoanRequest->input('loan_amount'),
                        advisorId: Auth::id()
                    )
        );

        return redirect()->route('cash_loan.edit', ['client' => $client->refresh()])
                         ->with('success', 'Client cash loan updated successfully!');
    }
}
