<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ".PHP_EOL;

$valueEntry = (int) readline('> ');
if(in_array($valueEntry, $numbers)) {
    echo 'Array contains number You entered'.PHP_EOL;
} else {
    echo 'Array does not include your number'.PHP_EOL;
}

//todo check if an array contains a value user entered