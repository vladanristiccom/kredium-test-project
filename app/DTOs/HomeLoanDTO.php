<?php

namespace App\DTOs;

class HomeLoanDTO extends ALoanDTO
{
    private float $downPaymentAmount;
    private float $propertyValue;

    /**
     * @param ?int $id
     * @param float $downPaymentAmount
     * @param float $propertyValue
     * @param int $advisorId
     */
    public function __construct(?int $id, float $downPaymentAmount, float $propertyValue, int $advisorId)
    {
        $this->id                = $id;
        $this->downPaymentAmount = $downPaymentAmount;
        $this->propertyValue     = $propertyValue;
        $this->advisorId         = $advisorId;
    }

    /**
     * @return float
     */
    public function getDownPaymentAmount(): float
    {
        return $this->downPaymentAmount;
    }

    /**
     * @param float $downPaymentAmount
     */
    public function setDownPaymentAmount(float $downPaymentAmount): void
    {
        $this->downPaymentAmount = $downPaymentAmount;
    }

    /**
     * @return float
     */
    public function getPropertyValue(): float
    {
        return $this->propertyValue;
    }

    /**
     * @param float $propertyValue
     */
    public function setPropertyValue(float $propertyValue): void
    {
        $this->propertyValue = $propertyValue;
    }

}
