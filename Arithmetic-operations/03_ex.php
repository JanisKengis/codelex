<?php

$lowerBound = 1;
$upperBound = 100;

//$numbers = range($lowerBound,$upperBound);
//$sum = array_sum($numbers);
$sum = 0;

for ($x = $lowerBound; $x <= $upperBound; $x++) {
    $sum = $sum + $x;
}
echo "The sum of {$lowerBound} to {$upperBound} is {$sum}" .PHP_EOL;
echo "The average is " . $sum / $upperBound . PHP_EOL;