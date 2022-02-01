<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$person = $items[0][1];

//echo $items[0][1]['name']. ' ' .$items[0][1]['surname']. ' ' .$items[0][1]['age'];
echo "{$person['name']} {$person['surname']} {$person['age']}";