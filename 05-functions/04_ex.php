<?php


function createPerson(string $name, int $age): stdClass{
    $person = new stdClass();
    $person->name = $name;
    $person->age = $age;
    return $person;
}

$persons = [
    createPerson('John', 50),
    createPerson('Jane', 16),
    createPerson('Frank', 21)
];

function personData(int $age): bool {
    return $age >=18;
}

foreach ($persons as $person){
        echo personData($person->age) ? "{$person->name} has reached age of 18".PHP_EOL : "{$person->name} is under age of 18" . PHP_EOL;
}

