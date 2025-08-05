<?php

// Task 1
trait Trait1
{
    public function method1()
    {
        return 1;
    }
}

trait WowTrait
{
    public function method1()
    {
        return 1;
    }
}

trait OMGTrait
{
    public function method1()
    {
        return 1;
    }
}

trait HelloRanif
{
    public function method1()
    {
        return 1;
    }
}

print_r("Task 1: ");
var_dump(trait_exists('Trait1'));
var_dump(trait_exists('Trait2'));
// Task 2
print_r("<br>Task 2: <br>");
foreach (get_declared_traits() as $trait => $value) {
    print_r($value . "<br>");
}