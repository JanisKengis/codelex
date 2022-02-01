<?php

class Battery
{
    private int $energyLevel;

    public function __construct($energyLevel)
    {
        $this->energyLevel = $energyLevel;
    }

    public function getEnergyLevel():int
    {
        return $this->energyLevel;
    }

    public function increaseEnergyLevel($amount)
    {
        $this->energyLevel += $amount;
        if($this->energyLevel >= 100){
            $this->energyLevel = 100;
        }
    }
}
