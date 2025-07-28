<?php
trait Helper {
    private $name;
    private $age;
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
}

class Country {
    use Helper;
    private $population;
    public function __construct($name, $age, $population)
    {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }
    public function getPopulation()
    {
        return $this->population;
    }
}

$country = new Country("Yoshkar-Ola", 2007, 350000);
print_r($country->getName() . " " . $country->getAge() . " " . $country->getPopulation() . "<br>");

trait Trait1 {
    private function method1()
    {
        return 1;
    }
}
trait Trait2 {
    private function method2()
    {
        return 2;
    }
}
trait Trait3 {
    private function method3()
    {
        return 3;
    }
}
class Test {
    use Trait1;
    use Trait2;
    use Trait3;
    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}

print_r("Methods sum: " . (new Test())->getSum());