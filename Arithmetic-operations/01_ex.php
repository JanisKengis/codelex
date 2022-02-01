<?php

$a = (int) readline('Enter number A: ');
$b = (int) readline('Enter number B: ');

if (($a === 15 || $b === 15) || $a + $b === 15 || $a - $b === 15 || $b - $a === 15) {
    echo "TRUE" . PHP_EOL;
}