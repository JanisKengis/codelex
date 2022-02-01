<?php

class Card
{
    private string $suit;
    private string $symbol;
    private int $colorIndex;

    public function __construct(string $suit, string $symbol)
    {
        $this->suit = $suit;
        $this->symbol = $symbol;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getColorIndex(): int
    {
        if($this->suit == '♦' || $this->suit == '♥'){
            return 0;
        } else {
            return 1;
        }
    }


    public function getDisplayValue(): ?string
    {
        return "{$this->symbol}.{$this->suit}";
    }

}