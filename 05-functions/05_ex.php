<?php

$fruits = [
    ['fruit' => 'bananas', 'weight'=> 10],
    ['fruit' => 'oranges', 'weight'=> 5],
    ['fruit' => 'apples', 'weight'=> 20]
];

$shippingCost = [
    'less than 10' => 1,
    'over 10' => 2
];

function weightLimit (int $weight): bool {
    return $weight >= 10;
}


foreach($fruits as $fruit){
    if (weightLimit($fruit['weight'])){
        echo "The cost of shipping {$fruit['weight']} kilos of {$fruit['fruit']} will be {$shippingCost['over 10']} euro". PHP_EOL;
    } else {
        echo "The cost of shipping {$fruit['weight']} kilos of {$fruit['fruit']} will be {$shippingCost['less than 10']} euro". PHP_EOL;
    }
}

//foreach ($fruits as $fruit){
//    foreach($shippingCost as $key=>$value){
//        if(weightLimit($fruit['weight']) && $key >= $fruit['weight']){
//            echo "The cost of shipping {$fruit['weight']} kilos of {$fruit['fruit']} will be {$value} euro". PHP_EOL;
//        } else {
//            echo "The cost of shipping {$fruit['weight']} kilos of {$fruit['fruit']} will be {$value} euro". PHP_EOL;
//        }
//    }
//}



//    if(weightLimit($fruit['weight'])){
//        echo "Shipping cost of {$fruit['weight']} kilos of {$fruit['fruit']} is "..PHP_EOL;
//    } else {
//        echo "Shipping cost of {$fruit['weight']} kilos of {$fruit['fruit']} is "" euro".PHP_EOL;
//    }
//}


//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight. Meaning that you can say that over 10 kg shipping costs
// are 2 euros, otherwise its 1 euro. Using foreach loop print out the values of the fruits and how much it would
// cost to ship this product.