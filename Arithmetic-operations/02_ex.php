<?php



function checkOddEven($number) {
    if ($number % 2 === 0) {
        echo "EVEN Number" . PHP_EOL;
    } else {
        echo "ODD Number" . PHP_EOL;
    }
    echo "bye!" . PHP_EOL;
};

$input = (int)readline('Enter number to determine if it is ODD or EVEN: ');

checkOddEven($input);