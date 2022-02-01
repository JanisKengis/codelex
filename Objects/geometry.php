<?php

class Geometry
{
    protected string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Square extends Geometry
{

    protected int $length;
    protected int $width;

    public function __construct(string $name, int $length, int $width)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->length = $length;
    }

    public function getArea(): float
    {
        return $this->length * $this->width;
    }
}

class Triangle extends Geometry
{
    protected int $height;
    protected int $base;

    public function __construct(string $name, int $height, int $base)
    {
        parent::__construct($name);
        $this->height = $height;
        $this->base = $base;

    }

    public function getArea(): float
    {
        return ($this->base * $this->height) / 2;
    }
}

class Circle extends Geometry
{
    protected int $radius;


    public function __construct(string $name, int $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return pow($this->radius, 2) * pi();
    }
}

class Calculator
{
    private array $calculator = [];

    public function addToCalculator(Geometry $name): void
    {
        $this->calculator[] = $name;
    }

    public function getFigure(): array
    {
        return $this->calculator;
    }

    public function totalArea(): float
    {
        $sum = 0;
        foreach ($this->calculator as $shape) {
            $sum += $shape->getArea();
        }
        return $sum;
    }
}


$calculator = new Calculator();

while (true) {

    echo 'Please choose option: ' . PHP_EOL;
    echo "[1] Calculate area of shape: " . PHP_EOL;
    echo "[2] History: " . PHP_EOL;
    $option = (int)readline('Enter option (1-2): ') . PHP_EOL;

    switch ($option) {
        case 1:
            echo 'Please choose shape:' . PHP_EOL;
            echo "[1] Square: " . PHP_EOL;
            echo "[2] Triangle: " . PHP_EOL;
            echo "[3] Circle" . PHP_EOL;
            echo "[4] Exit" . PHP_EOL;
            echo PHP_EOL;

            $shape = (int)readline('Choose option: ');

            switch ($shape) {
                case 1:
                    $nameOfSquare = readline('Please enter name for square: ');
                    $lengthOfSquare = (int)readline('Please enter length: ');
                    $widthOfSquare = (int)readline('Please enter width: ');
                    $square = new Square($nameOfSquare, $lengthOfSquare, $widthOfSquare);
                    $calculator->addToCalculator($square);
                    echo PHP_EOL;
                    echo 'The area of ' . $square->getName() . ' is ' . $square->getArea() . ' cm2' . PHP_EOL;
                    echo PHP_EOL;
                    break;
                case 2:
                    $nameOfTriangle = readline('Please enter name for triangle: ');
                    $heightOfTriangle = (int)readline('Please enter height: ');
                    $baseOfTriangle = (int)readline('Please enter base: ');
                    $triangle = new Triangle($nameOfTriangle, $heightOfTriangle, $baseOfTriangle);
                    $calculator->addToCalculator($triangle);
                    echo PHP_EOL;
                    echo 'The area of ' . $triangle->getName() . ' is ' . $triangle->getArea() . ' cm2' . PHP_EOL;
                    echo PHP_EOL;
                    break;
                case 3:
                    $nameOfCircle = readline('Please enter name for circle: ');
                    $radius = (int)readline('Please enter radius: ');
                    $circle = new Circle($nameOfCircle, $radius);
                    $calculator->addToCalculator($circle);
                    echo PHP_EOL;
                    echo 'The area of ' . $circle->getName() . ' is ' . $circle->getArea() . ' cm2' . PHP_EOL;
                    echo PHP_EOL;
                    break;
                case 4:
                    exit;
            }
            break;
        case 2:
            $totalSum = 0;
            foreach ($calculator->getFigure() as $shape) {
                echo 'The area of ' . $shape->getName() . ' is ' . $shape->getArea() . ' cm2' . PHP_EOL;
            }
            echo 'Total area of figures: ' . $calculator->totalArea() . PHP_EOL;
            break;
    }
}
