<?php
interface iFigure
{
    public function getSquare();
    public function getPerimeter();
}
class FiguresCollection
{
    private $figures = [];
    public function addFigure(iFigure $figure)
    {
        $this->figures[] = $figure;
    }
    public function getTotalSquare(): float
    {
        $sum = 0;
        foreach($this->figures as $figure)
        {
            $sum += $figure->getSquare();
        }
        return $sum;
    }

    public function getTotalPerimeter(): float
    {
        $sum = 0;
        foreach($this->figures as $figure)
        {
            $sum += $figure->getPerimeter();
        }
        return $sum;
    }
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

class Quadrate implements iFigure
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getSquare()
    {
        return $this->a * $this->a;
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }
}

class Rectangle implements iFigure
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
        return 2 * ($this->a + $this->b);
    }
}

$figureCollection = new FiguresCollection();
$figureCollection->addFigure(new Rectangle(10, 20));
$figureCollection->addFigure(new Quadrate(10));
$figureCollection->addFigure(new Disk(10));
print_r("Total S: " . $figureCollection->getTotalSquare() . " Total P: " . $figureCollection->getTotalPerimeter());