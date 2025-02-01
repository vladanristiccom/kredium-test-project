<?php

namespace App\DTOs;

class CashLoanDTO extends ALoanDTO
{
    private float $loanAmount;

    /**
     * @param ?int $id
     * @param float $loanAmount
     * @param int $advisorId
     */
    public function __construct(?int $id, float $loanAmount, int $advisorId)
    {
        $this->id         = $id;
        $this->loanAmount = $loanAmount;
        $this->advisorId  = $advisorId;
    }

    /**
     * @return float
     */
    public function getLoanAmount(): float
    {
        return $this->loanAmount;
    }

    /**
     * @param float $loanAmount
     */
    public function setLoanAmount(float $loanAmount): void
    {
        $this->loanAmount = $loanAmount;
    }

}
