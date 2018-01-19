<?php

include 'class_lib.php';

$weekly = new WeeklyEmployee();
$weekly->calcSalary(5000);

echo "<p> Your Salary is: ".$weekly->getCategory()."</p><p>and amount is:" .$weekly->getSalary(). "</p>";




$hourly = new HourlyEmployee(10);
$hourly->calcSalary(2);

echo $hourly->getSalary();

$commission = new CommissionedEmployee(0.5);
$commission->calcSalary(70000);

echo "<p>".$commission->getSalary()."</p>";

$commissionedSalaries = new CommissionedSalariedEmployee(1000, 0.5);

$commissionedSalaries->calcSalary(4000);
echo "<p>".$commissionedSalaries->getSalary()."</p>";






?>