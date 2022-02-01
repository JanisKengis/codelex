<?php

function employeeProfile(string $name, float $basePay, int $hoursWorked): stdClass
{
    $employee = new stdClass();
    $employee->name = $name;
    $employee->rate = $basePay;
    $employee->hours = $hoursWorked;
    return $employee;
}

$employees = [
    employeeProfile('Employee 1', 7.50, 35),
    employeeProfile('Employee 2', 8.20, 47),
    employeeProfile('Employee 3', 10.00, 73)
];


function calculateSalary(float $basePay, int $hours) {
    $overtimeFee = $basePay * 1.5;
    $overtimePay = ($hours - 40) * $overtimeFee;
    if($basePay < 8.00){
        return "Error - the State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.";
    } elseif($hours > 60) {
        return "Error - Foo Corp requires that an employee not work more than 60 hours in a week.";
    } else if ($hours > 40 && $hours <= 60) {
        return ($hours - ($hours - 40)) * $basePay + $overtimePay.' $';
    } else {
        return $basePay * $hours.' $';
    }
}

foreach($employees as $employee){
    echo "{$employee->name}: ".calculateSalary($employee->rate, $employee->hours).PHP_EOL;
}



//foreach($employees as $employee){
//    if($employee->rate < 8.00){
//        echo "The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.".PHP_EOL;
//    } elseif($employee->hours > 60){
//        echo "Foo Corp requires that an employee not work more than 60 hours in a week.".PHP_EOL;
//    } else {
//        echo 'Employee`s total salary is '.calculateSalary($employee->rate, $employee->hours).'$'.PHP_EOL;
//    }
//}

