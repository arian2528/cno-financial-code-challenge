<?php

namespace App\Service;

use App\Entity\Benefits;
use App\Entity\Employee;
use App\Entity\EmployeeInterface;
use App\Entity\Employer;
use App\Entity\EmployerInterface;

class EmployerEmployeeBenefitCalculator extends BenefitCalculator
{

    private Employer $employer;
    private Employee $employee;

    public function __construct(Employer $employer, Employee $employee)
    {
        $this->employer = $employer;
        $this->employee = $employee;
    }

    protected function calculateBenefitAmount(float $employeeWeeklySalary, float $employerBenefitRate): float
    {
        return round($employeeWeeklySalary * $employerBenefitRate, 2);
    }

    protected function calculateMonthlyCost(float $costRate): float
    {
        return round(($this->getBenefitAmount() / 10) * $costRate, 2);
    }

    protected function calculatePerPayCheckCost(int $perCycleCount): float
    {
        return round(($this->getMonthlyCost() * 12) / $perCycleCount ,2);
    }


    protected function getCappedBenefitAmount(): float
    {
        // set Benefit Amount
        $benefitAmount = $this->calculateBenefitAmount($this->employee->getWeeklySalary(), $this->employer->getBenefitRate());
        
        if ($benefitAmount > $this->employer->getBenefitMaximum()) {
            $benefitAmount = $this->employer->getBenefitMaximum();
        }

        return $benefitAmount;
    }

    public function calculate(): void
    {
        // get benefitAmount
        $this->setBenefitAmount($this->getCappedBenefitAmount());

        // get monthlyCost
        $this->setMonthlyCost($this->calculateMonthlyCost($this->employer->getCostRate()));

        // get perPayCheckCost
        $this->setPerPayCheckCost($this->calculatePerPayCheckCost($this->employee->getPayCycleCount()));


    }

    public function getBenefits(): array
    {
        $this->calculate();

        // return assoc array because we dont have a db setup to persist the data
        return [
            'benefitAmount' => $this->getBenefitAmount(),
            'perPayCheckCost' => $this->getPerPayCheckCost(),
            'monthlyCost' => $this->getMonthlyCost(),
        ];
    }

}