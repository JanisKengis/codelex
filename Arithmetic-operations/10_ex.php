<?php



class Geometry
{

    public static function areaOfCircle($r)
    {
        return pi() * $r * 2;
    }


    public static function areaOfRectangle($length, $width)
    {
        return $length * $width;
    }

    public static function areaOfTriangle($base, $height)
    {
        return $base * $height * 0.5;
    }
}

echo "Geometry Calculator".PHP_EOL.PHP_EOL;
echo "1. Calculate the Area of a Circle".PHP_EOL;
echo "2. Calculate the Area of a Rectangle".PHP_EOL;
echo "3. Calculate the Area of a Triangle".PHP_EOL;
echo "4. Quit".PHP_EOL;
$selectedOption = (int) readline("Enter your choice (1-4) : ");

switch($selectedOption)
{
    case 1:
        echo "Enter the radius (r) of a circle:".PHP_EOL;
        $r = (float) readline('> r = ');
        if ($r <= 0){
            echo "Error!".PHP_EOL;
        } else {
            echo 'Total area of the circle is: '.Geometry::areaOfCircle($r).PHP_EOL.PHP_EOL;
        }
        break;

    case 2:
        echo "Enter the length of a rectangle:".PHP_EOL;
        $length = (float) readline('> length = ');
        if ($length <= 0) {
            echo "Error!" . PHP_EOL;
            exit;
        }
        echo "Enter the width of a rectangle:".PHP_EOL;
        $width = (float) readline('> width = ');
        if ($width <= 0) {
            echo "Error!" . PHP_EOL;
            exit;
        }
        echo PHP_EOL;
        echo 'Total area of the rectangle is: '.Geometry::areaOfRectangle($length, $width).PHP_EOL.PHP_EOL;
        break;

    case 3:
        echo "Enter the length of triangle base:".PHP_EOL;
        $base = (float) readline('> triangle base = ');
        if ($base <= 0) {
            echo "Error!" . PHP_EOL;
            exit;
        }
        echo "Enter the height of triangle:".PHP_EOL;
        $height = (float) readline('> height = ');
        if ($height <= 0) {
            echo "Error!" . PHP_EOL;
            exit;
        }
        echo PHP_EOL;
        echo 'Total area of the triangle is: '.Geometry::areaOfTriangle($base, $height).PHP_EOL.PHP_EOL;
        break;

    case 4:
        exit;
    default:
        echo "Selected option outside range".PHP_EOL;
        exit;
}