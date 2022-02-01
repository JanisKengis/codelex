<?php


$N = 10;

$factorial = 1;

for ($x = 1; $x <= $N; $x++) {
    $factorial = $factorial * $x;
}
echo $factorial . PHP_EOL;