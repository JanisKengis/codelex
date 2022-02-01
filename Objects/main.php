<?php

//class Person
//{
//    public string $name;
//
//    public function __construct(string $name){
//        $this->name = $name;
//    }
//
//    public function sayHello():string{
//        return $this->name. ' is saying hello.';
//    }
//
//}
//$x = new Person('John');
//echo $x->sayHello().PHP_EOL;


class Weapon
{
    public string $name;
    public string $power;

    public function __construct(string $name, int $power){
        $this->name = $name;
        $this->power = $power;
    }
}

class Inventory
{
    public array $inventory = [];

    public function addWeapon(Weapon $weapon){
        return $this->inventory[] = $weapon;
    }
}

$glock = new Weapon('Glock', 50);
$AK47 = new Weapon('AK-47', 100);

$shop = new Inventory();
$shop->addWeapon($glock);
$shop->addWeapon($AK47);

foreach($shop as $item) {
    echo 'Current items in inventory: '.PHP_EOL;
    foreach ($item as $value) {
        echo 'Name: '.$value->name.', power: '.$value->power.PHP_EOL;
    }
}


