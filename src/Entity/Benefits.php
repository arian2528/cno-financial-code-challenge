<?php


namespace App\Entity;


class Benefits implements BenefitsInterface
{
    private float $benefitAmount;

    private float $perPayCheckCost;

    private float $monthlyCost;

    protected function setBenefitAmount(float $benefitAmount): void
    {
        $this->benefitAmount = $benefitAmount;
    }

    protected function setPerPayCheckCost(float $perPayCheckCost): void
    {
        $this->perPayCheckCost = $perPayCheckCost;
    }

    protected function setMonthlyCost(float $monthlyCost): void
    {
        $this->monthlyCost = $monthlyCost;
    }

    public function getBenefitAmount(): float
    {
        return $this->benefitAmount;
    }

    protected function getMonthlyCost(): float
    {
        return $this->monthlyCost;
    }

    protected function getPerPayCheckCost(): float
    {
        return $this->perPayCheckCost;
    }
}