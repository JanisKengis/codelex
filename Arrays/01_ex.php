<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: ".PHP_EOL;
//print_r($numbers);

foreach($numbers as $number) {
    echo $number.' ';
}
echo PHP_EOL;
echo PHP_EOL;
//todo
echo "Sorted numeric array: ".PHP_EOL;

asort($numbers);
foreach($numbers as $number) {
    echo $number .' ';
}
echo PHP_EOL;
echo PHP_EOL;

//print_r($numbers);

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: ".PHP_EOL;
//print_r($words);
foreach($words as $word) {
    echo $word.PHP_EOL;
}
echo PHP_EOL;
//todo
echo "Sorted string array: ".PHP_EOL;

asort($words);
//print_r($words);
foreach($words as $word) {
    echo $word.PHP_EOL;
}
