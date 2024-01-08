<?php

namespace App\Service;

use App\Entity\Benefits;

abstract class BenefitCalculator extends Benefits implements CalculatorInterface
{
    abstract public function calculate(): void;
}