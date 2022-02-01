<?php

$person = new stdClass();
$person->name = "John";
$person->cash = 2050;
$person->licenses = ["A", "C"];



function createWeapon(string $name, int $price, string $license = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon('Ak-47', 1000, 'C'),
    createWeapon('Deagle', 500, 'A'),
    createWeapon('Knife', 100),
    createWeapon('Glock',250, 'A')
];

$shoppingCart = [];

echo "{$person->name} has {$person->cash}$".PHP_EOL.PHP_EOL;

while(true)
{
    echo '[1] Purchase'.PHP_EOL;
    echo '[2] Basket'.PHP_EOL;
    echo '[3] Exit'.PHP_EOL;

    $makePurchase = readline('Select an option: ');

    switch ($makePurchase)
    {
        case 1:
            foreach($weapons as $index => $weapon)
            {
                echo "[{$index}]{$weapon->name} ({$weapon->license}) {$weapon->price}$".PHP_EOL;
            }


            $selectWeaponIndex = (int) readline('Select weapon: ');

            $weapon = $weapons[$selectWeaponIndex] ?? null;

            if ($weapon === null)
            {
                echo "Weapon not found.".PHP_EOL;
                exit;
            }

            if($weapon->license !== null && !in_array($weapon->license, $person->licenses))
            {
                echo 'Invalid license'.PHP_EOL;
                exit;
            }

            $shoppingCart[] = $weapon;
            echo "You added {$weapon->name} to basket".PHP_EOL;
            break;

        case 2:
            $totalSum = 0;
            echo "Items in basket:".PHP_EOL.PHP_EOL;
            foreach($shoppingCart as $weapon){
                $totalSum += $weapon->price;
                echo "{$weapon->name} - {$weapon->price}$".PHP_EOL;
            }
            echo '----------------'.PHP_EOL;

            echo "Total sum : {$totalSum}$".PHP_EOL;

            if ($person->cash >= $totalSum){
                echo "Purchase complete!".PHP_EOL;
            } else {
                echo "Sorry, not enough cash.".PHP_EOL;
            }

            exit;
        case 3:
            exit;
        default:
            exit;
    }
    }

//echo "{$person->name} has left with {$person->cash}$".PHP_EOL;
//foreach($weapons as $index => $weapon)
//{
//    echo "[{$index}]{$weapon->name} ({$weapon->license}) {$weapon->price}$".PHP_EOL;
//}
//
//
//$selectWeaponIndex = (int) readline('Select weapon: ');
//
//$weapon = $weapons[$selectWeaponIndex] ?? null;
//
//if ($weapon === null)
//{
//    echo "Weapon not found.".PHP_EOL;
//    exit;
//}
//
//if($weapon->license !== null && !in_array($weapon->license, $person->licenses))
//{
//    echo 'Invalid license'.PHP_EOL;
//    exit;
//}
//
//if($person->cash < $weapon->price){
//    echo 'Not enough cash'.PHP_EOL;
//    exit;
//}
//
//    $person->cash -= $weapon->price;
//    echo "{$person->name} has left with {$person->cash}$".PHP_EOL;
//}
//
