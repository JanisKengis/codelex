<?php

class Product {

    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct():string
    {
        return $this->name.', price '.$this->startPrice.', amount '.$this->amount;
    }

    public function changeAmount($amount):void
    {
        $this->amount = $amount;
    }

    public function changePrice($price):void
    {
        $this->startPrice = $price;
    }
}

$mouse = new Product("Logitech mouse", 70.00, 14);
echo $mouse->printProduct().PHP_EOL;
$phone = new Product("iPhone 5s", 999.99, 3);
echo $phone->printProduct().PHP_EOL;
$printer = new Product("Epson EB-U05", 440.46, 1);
echo $printer->printProduct().PHP_EOL;

$mouse->changeAmount(11);
$mouse->changePrice(159);
echo $mouse->printProduct().PHP_EOL;
