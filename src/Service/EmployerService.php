<?php

namespace App\Service;

use App\Entity\Employer;

class EmployerService extends Employer
{
    public function setEmployer(array $employerData): Employer
    {
        $employer = new Employer();
        $employer->setId($employerData['employer']);
        $employer->setBenefitRate($employerData['benefitRate']);
        $employer->setCostRate($employerData['costRate']);
        $employer->setBenefitMaximum($employerData['benefitMaximum']);

        return $employer;
    }
}