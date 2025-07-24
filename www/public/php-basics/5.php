<?php
class User {
    public $name;
    public $age;
    public function isAgeCorrect($age)
    {
        return $age >= 18 && $age <= 60 ? true : false;
    }
    public function setAge($newAge)
    {
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }
    public function addAge($age)
    {
        $newAge = $this->age + $age;
        if($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }
    public function subAge($age)
    {
        $newAge = $this->age - $age;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }
}

$user = new User;

$user->setAge(30); // установим возраст в 30
print_r("{$user->age}\n"); // выведет 30

$user->addAge(10);
print_r("{$user->age}\n");  // не выведет 10, а выведет 30

$user->subAge(5);
print_r("{$user->age}\n");