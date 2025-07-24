<?php
abstract class User
{
    private $name;
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    abstract public function increaseRevenue($value);
    abstract public function decreaseRevenue($value);
}
class Employee extends User
{
    private $salary;
    public function getSalary()
    {
        return $this->salary;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    public function increaseRevenue($value)
    {
        $this->salary += $value;
    }
    public function decreaseRevenue($value)
    {
        $this->salary -= $value;
    }
}
class Student extends User
{
    private $scholarship;
    public function getScholarship()
    {
        return $this->scholarship;
    }
    public function setScholarship($scholarship)
    {
        $this->scholarship = $scholarship;
    }
    public function increaseRevenue($value)
    {
        $this->scholarship += $value;
    }
    public function decreaseRevenue($value)
    {
        $this->scholarship -= $value;
    }
}

$student = new Student();
$employee = new Employee();
$student->setScholarship(5000);
$student->increaseRevenue(200);
$student->decreaseRevenue(100);
$employee->setSalary(15000);
$employee->increaseRevenue(4000);
$employee->decreaseRevenue(100);
print_r($student->getScholarship() . " " . $employee->getSalary() . "<br>");

abstract class Figure
{
    abstract public function getSquare();
    abstract public function getPerimeter();
    public function getSquarePerimeterSum()
    {
        return $this->getPerimeter() + $this->getSquare();
    }
}

class Rectangle extends Figure
{
    private $a;
    private $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function getSquare()
    {
        return $this->a * $this->b;
    }
    public function getPerimeter()
    {
        return ($this->a + $this->b) * 2;
    }
}
$rectangle = new Rectangle(10, 20);
print_r($rectangle->getPerimeter() . " " . $rectangle->getSquare() . " " . $rectangle->getSquarePerimeterSum());