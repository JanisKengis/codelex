<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private array $tyres;
    private array $headlights;
    private Battery $battery;
    private bool $started = false;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];

    public function __construct(string $name, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->tyres = [
            new Tyre('Front left', 100),
            new Tyre('Front right', 100),
            new Tyre('Rear left', 100),
            new Tyre('Rear right', 100),
        ];
        $this->headlights = [
            new Headlights('Low Beam Left'),
            new Headlights('Low Beam Right'),
            new Headlights('High Beam Left'),
            new Headlights('High Beam Right'),
        ];
        $this->battery = new Battery(50);
    }

    public function hasStarted():bool
    {
        return $this->started;
    }

    public function start():void
    {
        if($this->getEnergyLevel() < 5) return;
        if($this->getFuel() < 3) return;
        $this->started = true;
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);

        [$minQualityLoss, $maxQualityLoss] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach($this->tyres as $tyre)
        {
            $tyre->changeBalance(rand($minQualityLoss*$distance, $maxQualityLoss*$distance));
        }

        foreach ($this->headlights as $headlight)
        {
            if(strpos($headlight->getPosition(), 'High')!== false){
                $headlight->changeQuality(rand(0.5, 1));
            }
            if(strpos($headlight->getPosition(), 'Low')!== false){
                $headlight->changeQuality(rand(1, 2));
            }
        }

        $this->battery->increaseEnergyLevel(1);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function validateTyresBalance():bool
    {
        $brokenTyres = [];
        foreach ($this->tyres as $tyre){
            if($tyre->getTyreBalance() <= 0)
                $brokenTyres[]=$tyre;
        }
        return count($brokenTyres) < 2;
    }

    public function getTyres():array
    {
        return $this->tyres;
    }

    public function validateHeadlightQuality():bool
    {
        foreach ($this->headlights as $headlight){
            if($headlight->getQuality() <= 50) return false;
        }
        return true;
    }

    public function getHeadlights():array
    {
        return $this->headlights;
    }

    public function getEnergyLevel():int
    {
        return $this->battery->getEnergyLevel();
    }
}
