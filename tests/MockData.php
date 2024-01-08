<?php

namespace Tests;

class MockData
{
    public static array $employeers = array(
        '1' => [
            'benefitRate' => 0.6,
            'costRate' => 0.25,
            'benefitMaximum' => 2500,
        ],
        '2' => [
            'benefitRate' => 0.4,
            'costRate' => 0.55,
            'benefitMaximum' => 2000,
        ],
    );

    public static array $employees = array(
        '1' => [
            'salary' => 58232.93,
            'payCycleCount' => 26
        ],
        '2' => [
            'salary' => 250000,
            'payCycleCount' => 24
        ],
    );

    public static array $expectedResults = array(
        '1-1' => [
            'employer' => 1,
            'employee' => 1,
            'benefitAmount' => 671.91,
            'perPayCheckCost' => 7.75,
            'monthlyCost' => 16.8,
        ],
        '1-2' => [
            'employer' => 1,
            'employee' => 2,
            'benefitAmount' => 2500,
            'perPayCheckCost' => 31.25,
            'monthlyCost' => 62.5,
        ],
        '2-1' => [
            'employer' => 2,
            'employee' => 1,
            'benefitAmount' => 447.95,
            'perPayCheckCost' => 11.37,
            'monthlyCost' => 24.64,
        ],
        '2-2' => [
            'employer' => 2,
            'employee' => 2,
            'benefitAmount' => 1923.08,
            'perPayCheckCost' => 52.88,
            'monthlyCost' => 105.77,
        ],
    );
}