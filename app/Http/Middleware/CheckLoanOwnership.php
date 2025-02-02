<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoanOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $client = $request->route('client');

        $loanType = $request->route()->getName();

        if (in_array($loanType, ['home_loan.edit', 'home_loan.update'])) {
            if ($client->homeLoan && $client->homeLoan->advisor_id != auth()->id()) {
                return redirect()->route('dashboard')->withErrors('You are not authorized to edit this loan.');
            }
        } elseif (in_array($loanType, ['cash_loan.edit', 'cash_loan.update'])) {
            if ($client->cashLoan && $client->cashLoan->advisor_id != auth()->id()) {
                return redirect()->route('dashboard')->withErrors('You are not authorized to edit this loan.');
            }
        }

        return $next($request);
    }
}
