<?php

namespace App\Service;

use App\Entity\Employee;

class EmployeeService extends Employee
{   
    public function setEmployee(array $employeeData): Employee
    {
        $employee = new Employee();
        $employee->setId($employeeData['employee']);
        $employee->setSalary($employeeData['salary']);
        $employee->setPayCycleCount($employeeData['payCycleCount']);

        return $employee;
    }
}