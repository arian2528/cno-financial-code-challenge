<?php

namespace Tests;

use App\Entity\Employee;
use App\Entity\Employer;

use App\Service\EmployeeService;
use App\Service\EmployerEmployeeBenefitCalculator;

use App\Service\EmployerService;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertEqualsWithDelta;

class SummaryBenefitsTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    private function setEmployer(array $benefitExpected): Employer
    {
        $employerData = [
            'employer' => $benefitExpected['employee'],
            'benefitRate'   => MockData::$employeers[$benefitExpected['employer']]['benefitRate'],
            'costRate' => MockData::$employeers[$benefitExpected['employer']]['costRate'],
            'benefitMaximum' => MockData::$employeers[$benefitExpected['employer']]['benefitMaximum']
        ];

        $employeeService = new EmployerService();

        return $employeeService->setEmployer($employerData);
    }

    private function setEmployee(array $benefitExpected): Employee
    {
        $employeeData = [
            'employee' => $benefitExpected['employee'],
            'salary'   => MockData::$employees[$benefitExpected['employee']]['salary'],
            'payCycleCount' => MockData::$employees[$benefitExpected['employee']]['payCycleCount']
        ];

        $employeeService = new EmployeeService();

        return $employeeService->setEmployee($employeeData);
    }

    public function testGetBenefits(): void
    {
        foreach (MockData::$expectedResults as $benefitExpected) {
            // given
            $employer = $this->setEmployer($benefitExpected);
            $employee = $this->setEmployee($benefitExpected);

            // when //here is where I need my code. My method that will get the results
            $employerEmployeeBenefitsCalculator = new EmployerEmployeeBenefitCalculator($employer, $employee);
            $benefits = $employerEmployeeBenefitsCalculator->getBenefits();

            // then
            assertEqualsWithDelta((float)$benefits['benefitAmount'], $benefitExpected['benefitAmount'], 0.01);
            assertEqualsWithDelta((float)$benefits['perPayCheckCost'], $benefitExpected['perPayCheckCost'], 0.01);
            assertEqualsWithDelta((float)$benefits['monthlyCost'], $benefitExpected['monthlyCost'], 0.01);
        }
    }
}