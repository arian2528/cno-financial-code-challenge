<?php

namespace App\Service;

use App\Entity\EmployeeInterface;
use App\Entity\EmployerInterface;

interface CalculatorInterface
{
    public function calculate(): void;
}