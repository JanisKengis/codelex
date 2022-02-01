<?php

$persons = [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50,
            "birthday" => "22.12.1971"
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41,
            "birthday" => "27.12.1980"
        ],
        [
            "name" => "Frank",
            "surname" => "Doe",
            "age" => 21,
            "birthday" => "18.11.2000"
        ]
];

foreach ($persons as $person){
    foreach($person as $key => $value){
        echo $key . ': ' . $value . PHP_EOL;
    }
}

//for ($i = 0; $i <= count($persons); $i++) {
//    foreach ($persons[$i] as $key => $value) {
//        echo $key . ': ' . $value . PHP_EOL;
//    }
//}

//foreach ($persons as $person) {
//    echo $person['name'].PHP_EOL
//    }
//}
//for ($i = 0; $i <= count($persons); $i++){
//    echo $persons[$i]['key'] => $value.PHP_EOL;
//}
//foreach ($persons[0] as $key => $value){
//    echo $persons[0] => $value. PHP_EOL;
//}
//$person = $items[0][1];
//
////echo $items[0][1]['name']. ' ' .$items[0][1]['surname']. ' ' .$items[0][1]['age'];
//echo "{$person['name']} {$person['surname']} {$person['age']}";