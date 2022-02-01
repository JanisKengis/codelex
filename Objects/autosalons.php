<?php

class Car
{
    public string $brand;
    public string $model;

    public function __construct(string $brand, string $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

}

class CarDealership
{
    public array $available = [];
    public array $reserved = [];

    public function addCar(Car $car)
    {
        return $this->available[] = $car;
    }

    public function reserveCar(Car $car)
    {
        unset($this->available[(array_search($car, $this->available))]);
        return $this->reserved[] = $car;
    }

}

$audi = new Car('Audi', 'A6');
$bmw = new Car('BMW', 'X6');
$nissan = new Car('Nissan', 'X-trail');
$toyota = new Car('Toyota', 'Rav4');

$salon = new CarDealership();
$salon->addCar($audi);
$salon->addCar($bmw);
$salon->addCar($nissan);
$salon->addCar($toyota);


$reservedCar = [];

echo 'Welcome to Car Dealership!' . PHP_EOL;

while (true) {

    echo 'Available cars: ' . PHP_EOL;
    foreach ($salon as $index => $car) {
        foreach ($car as $i => $item) {
            if ($index == 'available') {
                echo "[{$i}] - {$item->brand} {$item->model}" . PHP_EOL;
            }
        }
    }
    $carIndex = (int)readline('Choose a car: ');

    $reservedCar[] = $salon->reserveCar($salon->available[$carIndex]);

    echo PHP_EOL;
    echo "Reserved Cars: " . PHP_EOL;
    foreach ($reservedCar as $index => $car) {
        echo "[{$index}] {$car->brand} {$car->model}" . PHP_EOL;
    }
    echo PHP_EOL;
}
