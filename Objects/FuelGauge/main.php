<?php

require_once 'Battery.php';
require_once 'fuelGauge.php';
require_once 'HeadLights.php';
require_once 'Odometer.php';
require_once 'Tyre.php';
require_once 'Car.php';


$name = readline('Car name: ');
$fuelGaugeAmount = (int) readline('Fuel Gauge amount: ');
$driveDistance = (int) readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;
$car->start();
if(!$car->hasStarted()){
    echo $car->getName(). ' has not started.'.PHP_EOL;
}

while ($car->getFuel() > 0 && $car->validateTyresBalance() && $car->validateHeadlightQuality() && $car->hasStarted()) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;

    foreach($car->getTyres() as $tyre){
        echo "Tyre ({$tyre->getPosition()}): " . $tyre->getTyreBalance() . "%" . PHP_EOL;
    }

    foreach($car->getHeadlights() as $headlight){
        echo "({$headlight->getPosition()}): " . $headlight->getQuality() . "%" . PHP_EOL;
    }

    echo "Battery: " . $car->getEnergyLevel() . "%" . PHP_EOL;

    $car->drive($driveDistance);

    sleep(1);
}