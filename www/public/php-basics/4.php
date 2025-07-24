<?php
class Employee {
    public $name;
    public $age;
    public $salary;
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getSalary()
    {
        return $this->salary;
    }
    public function checkAge()
    {
        return $this->age > 18;
    }
    public function doubleSalary()
    {
        $this->salary *= 2;
    }
}

class User {
    public $name;
    public $age;
    public function setAge($newAge)
    {
        if ($newAge >= 18) {
            $this->age = $newAge;
        }
    }
}

class Rectangle {
    public $width;
    public $height;
    public function getSquare()
    {
        return $this->width * $this->height;
    }
    public function getPerimeter()
    {
        return $this->width * 2 + $this->height * 2;
    }
}

$employee1 = new Employee();
$employee1->name = 'John';
$employee1->age = 25;
$employee1->salary = 1000;

$employee2 = new Employee();
$employee2->name = 'Eric';
$employee2->age = 26;
$employee2->salary = 2000;

$user1 = new User();
$user1->name = 'John';
$user1->age = 25;
$user1->setAge(30);


$salarySum = $employee1->getSalary() + $employee2->getSalary();

print_r("Salary sum: {$salarySum}\n");

print_r("User name: {$user1->name}\n User age: {$user1->age}\n");

print_r("Employee1 Salary before: {$employee1->salary}\n");
$employee1->doubleSalary();
print_r("Employee1 Salary after: {$employee1->salary}\n");

$rectangle = new Rectangle();
$rectangle->width = 20;
$rectangle->height = 10;

print_r("Rectangle square: {$rectangle->getSquare()}\nRecangle perimeter: {$rectangle->getPerimeter()}\n");