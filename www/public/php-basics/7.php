<?php
class Employee {
    public $name;
    public $age;
    public $salary;
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

$employee1 = new Employee('Eric', 25, 1000);
$employee2 = new Employee('Kyle', 30, 2000);

print_r("Name: {$employee1->name}\nAge: {$employee1->age}\nSalary: {$employee1->salary}\n");
print_r("Name: {$employee2->name}\nAge: {$employee2->age}\nSalary: {$employee2->salary}\n");
$salarySum = $employee2->salary + $employee1->salary;
print_r("Salary sum: {$salarySum}\n");