<?php

trait Trait1
{
    public function method1()
    {
        return 1;
    }

    public function method2()
    {
        return 2;
    }
}

trait Trait2
{
    use Trait1;

    public function method3()
    {
        return 3;
    }
}

class Test
{
    use Trait2;
}

print_r("methods sum: " . (new Test())->method1() + (new Test())->method2() + (new Test())->method3());