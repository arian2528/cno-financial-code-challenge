<?php

namespace App\Entity;

class Employer implements EmployerInterface
{
    private int $id;

    private string $benefitRate;

    private string $costRate;

    private string $benefitMaximum;

    public function getId(): int
    {
        return $this->id;
    }

    protected function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBenefitRate(): string
    {
        return $this->benefitRate;
    }

    protected function setBenefitRate(string $benefitRate): void
    {
        $this->benefitRate = $benefitRate;
    }

    public function getCostRate(): string
    {
        return $this->costRate;
    }

    protected function setCostRate(string $costRate): void
    {
        $this->costRate = $costRate;
    }

    public function getBenefitMaximum(): float
    {
        return $this->benefitMaximum;
    }

    protected function setBenefitMaximum(float $benefitMaximum): void
    {
        $this->benefitMaximum = $benefitMaximum;
    }


}