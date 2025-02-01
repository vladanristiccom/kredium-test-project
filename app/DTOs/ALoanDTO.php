<?php

namespace App\DTOs;

abstract class ALoanDTO
{
    protected ?int $id;
    protected int $advisorId;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
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
