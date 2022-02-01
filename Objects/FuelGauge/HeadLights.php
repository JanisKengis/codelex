<?php

class Headlights
{
    private string $position;
    private float $quality;

    public function __construct( string $position, float $quality = 100)
    {
        $this->position = $position;
        $this->quality = $quality;
    }

    public function getPosition():string
    {
        return $this->position;
    }

    public function getQuality():float
    {
        return $this->quality;
    }

    public function changeQuality($amount):void
    {
        $this->quality -= $amount;
    }

}