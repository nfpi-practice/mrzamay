<?php
require_once 'employeeClass.php';
require_once 'userClass.php';

$employee = new Employee("John", 25, 1000);
$user = new User();

print_r("Name: {$employee->name}\nSalary: {$employee->salary}\n");