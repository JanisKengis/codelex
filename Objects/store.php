<?php

class Product
{
    public string $name;
    public float $price;
    public int $amount;

    public function __construct(string $name, float $price, int $amount){
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }
}

class Inventory
{
    public array $inventory = [];

    public function addProduct(Product $product){
        return $this->inventory[] = $product;
    }

    public function sumPrice():float {
        $sum = 0;
        foreach($this->inventory as $product){
            $sum += $product->price * $product->amount;
        }
        return $sum;
    }

    public function sumAmount():int {
        $amount = 0;
        foreach($this->inventory as $product){
            $amount += $product->amount;
        }
        return $amount;
    }
}

$banana = new Product('Bananas', 1,5);
$bread = new Product('Bread', 1.20,50);
$eggs = new Product('Eggs', 1.50, 3);


$shop = new Inventory();
$shop->addProduct($banana);
$shop->addProduct($bread);
$shop->addProduct($eggs);


echo 'Current items in inventory: '.PHP_EOL;
echo PHP_EOL;

foreach($shop as $item) {
    foreach ($item as $value) {
        echo 'Name: '.$value->name.', price: '.$value->price.', amount: '.$value->amount.PHP_EOL;
    }
}

echo '________________________________________'.PHP_EOL;
echo "Totals: price = ".$shop->sumPrice()." amount = ".$shop->sumAmount().PHP_EOL;