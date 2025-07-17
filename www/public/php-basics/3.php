<?php
class Employee {
    public $name;
    public $age;
    public $salary;

    public function show($str)
    {
        return $str."?!";
    }
}

$user1 = new Employee();

print_r("{$user1->show('name')}");
