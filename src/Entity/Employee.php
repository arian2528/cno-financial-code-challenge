<?php

namespace App\Entity;

class Employee implements EmployeeInterface
{
    private int $id;

    private string $salary;

    private string $payCycleCount;

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
    protected function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSalary(): string
    {
        return $this->salary;
    }

    protected function setSalary(string $salary): void
    {
        $this->salary = $salary;
    }

    public function getPayCycleCount(): string
    {
        return $this->payCycleCount;
    }

    protected function setPayCycleCount(string $payCycleCount): void
    {
        $this->payCycleCount = $payCycleCount;
    }

    public function getWeeklySalary(): float
    {
        return $this->salary / 52;
    }
}