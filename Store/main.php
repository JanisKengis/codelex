<?php

[$name, $cash] = explode(',', file_get_contents('buyer.txt'));

$person = new stdClass();
$person->name = $name;
$person->cash = $cash;


function createProduct(string $name, int $price, string $category, string $description, string $expires, int $amount): stdClass
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->description = $description;
    $product->expires = $expires;
    $product->amount = $amount;

    return $product;
}

$products = [];

if (($handle = fopen("products.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        [$name, $price, $category, $description, $expires, $amount] = $data;
        $products[] = createProduct($name, $price, $category, $description, $expires, $amount);
        }
    fclose($handle);
}

$shoppingCart = [];

if(file_exists('basket.txt')) {
    $shoppingCart = explode(',', file_get_contents('basket.txt'));
}



echo "{$person->name} has {$person->cash}$" . PHP_EOL . PHP_EOL;

while (true) {
    echo '[1] Purchase' . PHP_EOL;
    echo '[2] Basket' . PHP_EOL;
    echo '[3] Exit' . PHP_EOL;
    echo '[4] Previous Basket'.PHP_EOL;

    $makePurchase = readline('Select an option: ');

    switch ($makePurchase) {
        case 1:
            foreach ($products as $index => $product) {
                echo "[{$index}]{$product->name} {$product->price}$, category [{$product->category}], description- {$product->description}, expiry date: {$product->expires}, amount in store - {$product->amount}" . PHP_EOL;
            }

            $selectProductIndex = (int)readline('Select product: ');

            $product = $products[$selectProductIndex] ?? null;

            if ($product === null) {
                echo "Product not found." . PHP_EOL;
                exit;
            }


            $shoppingCart[] = $selectProductIndex;




            echo "You added {$product->name} to basket" . PHP_EOL;
            break;

        case 2:
            $totalSum = 0;
            echo "Items in basket:" . PHP_EOL . PHP_EOL;
            foreach ($shoppingCart as $productIndex) {
                $product = $products[$productIndex];
                $totalSum += $product->price;
                echo "{$product->name} - {$product->price}$" . PHP_EOL;
            }
            echo '----------------' . PHP_EOL;

            echo "Total sum : {$totalSum}$" . PHP_EOL;

            if ($person->cash >= $totalSum) {
                echo "Purchase complete!" . PHP_EOL;
            } else {
                echo "Sorry, not enough cash." . PHP_EOL;
            }

            if(file_exists('basket.txt')) {
                unlink('basket.txt');
            }
            exit;
        case 3:
            exit;
        case 4:
            break;
        default:
            $productIndexes = implode(',', $shoppingCart);
            file_put_contents('basket.txt', $productIndexes);
            exit;
    }
}
