<?php

$numberArray = [10, 20, 30, 40, 50, 60, 70, 80, 90];

foreach ($numberArray as $number) {
    if ($number % 3 === 0)  {
        echo $number . PHP_EOL;
    }
}
