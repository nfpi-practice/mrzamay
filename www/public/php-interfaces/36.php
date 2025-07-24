<?php
interface iFigure
{
    public function getSquare();
    public function getPerimeter();
}

class Disk implements iFigure
{
    private $radius = 0.0;
    const PI = 3.14;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getSquare(): float
    {
        return $this->radius ** 2 * self::PI;
    }
    public function getPerimeter(): float
    {
        return $this->radius * 2 * self::PI;
    }
}
$disk = new Disk(3);
print_r("Disk P: " . $disk->getPerimeter() . " Disk S: " . $disk->getSquare());