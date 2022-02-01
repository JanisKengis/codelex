<?php

class Player
{
    private array $cards;

    public function getCards(): array
    {
        return $this->cards;
    }

    public function draw(?Card $card): void
    {
        $this->cards[] = $card;
    }

    public function remove(?Card $card): void
    {
        unset($this->cards[array_search($card, $this->cards)]);
    }

    public function isWinningState():bool
    {
        if (count($this->cards) == 0){
            return true;
        } return false;
    }

    public function disband()
    {
        $symbols = [];
        foreach ($this->cards as $card) {
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count)
        {
            if ($count == 1) continue;
            if ($count == 4) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSymbol() == $symbol) {
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count == 2) {
                foreach ($this->cards as $index => $card) {
                    if ($card->getSuit() == '♣' || $card->getSuit() == '♠') {
                        if ($card->getSymbol() == $symbol && $card->getColorIndex() == 1) {
                            unset($this->cards[$index]);
                        }
                    }
                    if ($card->getSuit() == '♥' || $card->getSuit() == '♦') {
                        if ($card->getSymbol() == $symbol && $card->getColorIndex() == 0) {
                            unset($this->cards[$index]);
                        }

                    }
                }
            }
            if ($count == 3) {
                for ($i = 0; $i < 2; $i++) {
                    foreach ($this->cards as $index => $card) {
                        if ($card->getSuit() == '♣' || $card->getSuit() == '♠') {
                            if ($card->getSymbol() == $symbol && $card->getColorIndex() == 1) {
                                unset($this->cards[$index]);
                                break;
                            }
                        }
                        if ($card->getSuit() == '♥' || $card->getSuit() == '♦')
                            if ($card->getSymbol() == $symbol && $card->getColorIndex() == 0) {
                                unset($this->cards[$index]);
                                break;
                            }
                    }
                }
            }
        }
    }
}

