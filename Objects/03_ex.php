<?php

class FuelGauge
{
    protected float $fuelLevel;

    public function __construct(float $fuelLevel)
    {
        $this->fuelLevel = $fuelLevel;
    }

    public function getFuelLevel():float
    {
        return $this->fuelLevel;
    }

    public function fillFuelTank()
    {
        if($this->fuelLevel >= 70){
            echo 'Fuel tank is full!'.PHP_EOL;
        } else {
            $this->fuelLevel++;
        }
    }

    public function burnFuel()
    {
        if($this->fuelLevel > 0){
            $this->fuelLevel--;
        } else {
            echo 'Fuel tank is empty!'.PHP_EOL;
        }
    }
}

class Odometer extends FuelGauge
{
    protected float $mileage;

    public function __construct(float $fuelLevel, float $mileage)
    {
        parent::__construct($fuelLevel);
        $this->mileage = $mileage;
    }

    public function getMileage():float
    {
        return $this->mileage;
    }

    public function incrementMileage():float
    {
        if($this->mileage >= 999999){
            return $this->mileage = 0;
        } else {
           return $this->mileage;
        }
    }

    public function drive()
    {
            $this->mileage +=10;
            $this->burnFuel();
    }
}

$currentFuel = (int)readline('Please enter current amount of fuel: ');
$car = new FuelGauge($currentFuel);
$currentMileage = (int)readline('Please enter current mileage: ');
$trip = new Odometer($car->getFuelLevel(), $currentMileage);


while($currentFuel >= 0)
{

    if($trip->incrementMileage() != 999999){
        $trip->drive();
    }

    echo 'Current fuel level: '.$trip->getFuelLevel().' liters'.PHP_EOL;
    echo 'Current mileage: '.$trip->getMileage().' kilometers'.PHP_EOL;
    echo PHP_EOL;

    if($trip->getFuelLevel() == 0){
        while ($trip->getFuelLevel() != 70){
            $trip->fillFuelTank();
        }
        echo 'Fuel tank filled up!'.PHP_EOL;
    }

    sleep(1);

}
