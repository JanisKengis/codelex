<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $a, Point $b):array
    {
        [$a, $b] = [$b, $a];
        return [$a, $b];
    }
}


$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
[$p1, $p2] = $p1->swapPoints($p1, $p2);


echo "(" . $p1->x . ", " . $p1->y . ")".PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")".PHP_EOL;


