<?php

namespace App\DTOs;

class HomeLoanDTO
{
    private int $id;
    private float $downPaymentAmount;
    private float $propertyValue;
    private int $advisorId;

    /**
     * @param int $id
     * @param float $downPaymentAmount
     * @param float $propertyValue
     * @param int $advisorId
     */
    public function __construct(int $id, float $downPaymentAmount, float $propertyValue, int $advisorId)
    {
        $this->id                = $id;
        $this->downPaymentAmount = $downPaymentAmount;
        $this->propertyValue     = $propertyValue;
        $this->advisorId         = $advisorId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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

    /**
     * @return int
     */
    public function getAdvisorId(): int
    {
        return $this->advisorId;
    }

    /**
     * @param int $advisorId
     */
    public function setAdvisorId(int $advisorId): void
    {
        $this->advisorId = $advisorId;
    }


}
