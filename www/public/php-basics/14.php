<?php
class City
{
    public $name;
    public $population;
    public $foundation;
    public function __construct($name, $population, $foundation)
    {
        $this->name = $name;
        $this->population = $population;
        $this->foundation = $foundation;
    }
}

$city = new City("Yoshkar-Ola", 350000, 1584);
$props = ["name", "population", "foundation"];
foreach ($props as $prop) {
    print_r("{$city->$prop}\n");
}

class User
{
    public $surname; // фамилия
    public $name; // имя
    public $patronymic; // отчество

    public function __construct($surname, $name, $patronymic)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }
}

$user = new User("Timofeev", "Ivan", "Dmitrievich");
$props = ["surname", "name", "patronymic"];
print_r("{$user->{$props[0]}} {$user->{$props[1]}} {$user->{$props[2]}}\n");