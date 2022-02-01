<?php

class Tyre
{

    private string $position;
    private int $tyreBalance;

    public function __construct(string $position, int $tyreBalance = 100)
    {
        $this->position = $position;
        $this->tyreBalance = $tyreBalance;
    }

    public function getPosition():string
    {
        return $this->position;
    }
    public function getTyreBalance():int
    {
        return $this->tyreBalance;
    }

    public function changeBalance($amount):void
    {
        $this->tyreBalance -= $amount;
    }
}
