<?php

$number = 50;

switch ($number) {
    case $number < 50:
        echo "Low" . PHP_EOL;
        break;
    case $number >=50 && $number < 100:
        echo "medium" . PHP_EOL;
        break;
    case $number >= 100:
        echo "High" . PHP_EOL;
        break;
}
