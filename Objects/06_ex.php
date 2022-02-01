<?php

class EnergyDrinks
{
    private int $surveyedCustomers = 12467;
    private const PURCHASED_ENERGY_DRINKS = 0.14;
    private const PREFER_CITRUS_FLAVOUR = 0.64;

    public function getSurveyedCustomers():int
    {
        return $this->surveyedCustomers;
    }

    public function calculateEnergyDrinkers(): int
    {
        return $this->surveyedCustomers * self::PURCHASED_ENERGY_DRINKS;
    }

    public function calculatePreferCitrus(): int
    {
        return $this->calculateEnergyDrinkers() * self::PREFER_CITRUS_FLAVOUR;
    }
}

$energy = new EnergyDrinks();

echo "Total number of people surveyed " . $energy->getSurveyedCustomers().PHP_EOL;
echo "Approximately " .$energy->calculateEnergyDrinkers(). " bought at least one energy drink".PHP_EOL;
echo $energy->calculatePreferCitrus() . " of those prefer citrus flavored energy drinks.".PHP_EOL;
