<?php


$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 16;


function personData(int $age): bool {
    return $age >=18;
}

if (personData($person->age)) {
    echo "{$person->name} is an adult".PHP_EOL;
} else {
    echo "{$person->name} is underage".PHP_EOL;
}
