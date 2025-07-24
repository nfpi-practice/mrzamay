<?php
class City
{
    public $name;
    public $population;
    public function __construct($name, $population)
    {
        $this->name = $name;
        $this->population = $population;
    }
}

$cities = [
    new City("Moscow", 22222222),
    new City("Madrid", 1111111),
    new City("Paris", 4444444),
    new City("London", 5555555),
    new City("Yoshkar-Ola", 300000)
];
foreach ($cities as $city) {
    echo $city->name . ", " . $city->population . "\n";
}