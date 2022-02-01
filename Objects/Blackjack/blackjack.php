<?php

class Deck
{
    private array $cardValues = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'];
    private array $cardSuits = ['♣', '♦', '♥', '♠'];
    protected array $deck;
    private array $playerHand;
    private array $computerHand;

    public function createDeck(): array
    {
        foreach ($this->cardSuits as $suit) {
            foreach ($this->cardValues as $value) {
                $this->deck[] = [$value, $suit];
            }
        }
        return $this->deck;
    }

    public function shuffleDeck(): array
    {
        $this->createDeck();
        shuffle($this->deck);
        return $this->deck;
    }

    public function dealStartingHandPlayer(): array
    {
        return $this->playerHand = [array_pop($this->deck), array_pop($this->deck)];
    }

    public function dealStartingHandComputer(): array
    {
        return $this->computerHand = [array_pop($this->deck), array_pop($this->deck)];
    }

    public function dealPlayer(): array
    {
        return $this->playerHand[] = array_pop($this->deck);
    }

    public function dealComputer(): array
    {
        return $this->computerHand[] = array_pop($this->deck);
    }

    public function getPlayerHand(): array
    {
        return $this->playerHand;
    }

    public function getComputerHand(): array
    {
        return $this->computerHand;
    }

    public function calculateCardValue(array $deck): int
    {
        $totalValue = 0;
        foreach ($deck as $card) {
            if ($card[0] == "J" || $card[0] == "K" || $card[0] == "Q") {
                $totalValue += 10;
            }
            if ($card[0] == "A") {
                if($totalValue + 11 > 21){
                    $totalValue +=1;
                } else {
                    $totalValue += 11;
                }
            }
            if (is_numeric($card[0])) {
                $totalValue += $card[0];
            }
        }
        return $totalValue;
    }

}

$deck = new Deck;
$deck->shuffleDeck();


echo 'Welcome to BlackJack card game!' . PHP_EOL;
while (true) {
    echo PHP_EOL;
    echo '[1] Draw cards or [2] Exit';

    $option = (int)readline(' ');

    switch ($option) {
        case 1:
            $deck->dealStartingHandPlayer();
            echo 'Player cards: ' . PHP_EOL;
            foreach ($deck->getPlayerHand() as $card) {
                [$value, $suit] = $card;
                echo $value . ' of ' . $suit . PHP_EOL;
            }
            echo 'Total card value: ' . $deck->calculateCardValue($deck->getPlayerHand()) . PHP_EOL;
            echo PHP_EOL;


            while ($deck->calculateCardValue($deck->getPlayerHand()) <= 21) {
                echo 'Pick another [1] or hold [2]?';
                $pickOrHold = (int)readline(' ');
                echo PHP_EOL;
                if ($pickOrHold == 1) {
                    $deck->dealPlayer();
                    echo 'Player picked another card!' . PHP_EOL;
                    echo 'Player cards: ' . PHP_EOL;
                    foreach ($deck->getPlayerHand() as $card) {
                        [$value, $suit] = $card;
                        echo $value . ' of ' . $suit . PHP_EOL;
                    }
                    echo 'Total card value: ' . $deck->calculateCardValue($deck->getPlayerHand()) . PHP_EOL;
                    echo PHP_EOL;
                }

                if ($deck->calculateCardValue($deck->getPlayerHand()) > 21) {
                    echo 'DEALER WON!' . PHP_EOL;
                    exit;
                }
                if ($deck->calculateCardValue($deck->getPlayerHand()) == 21) {
                    echo 'PLAYER HAS 21!' . PHP_EOL;
                    break;
                }
                if ($pickOrHold == 2) {
                    echo 'Player holds!' . PHP_EOL;
                    echo PHP_EOL;
                    break;
                }
            }
            sleep(1);
            $deck->dealStartingHandComputer();
            echo 'Dealer cards: ' . PHP_EOL;
            foreach ($deck->getComputerHand() as $card) {
                [$value, $suit] = $card;
                echo $value . ' of ' . $suit . PHP_EOL;
            }
            echo 'Total card value: ' . $deck->calculateCardValue($deck->getComputerHand()) . PHP_EOL;
            echo PHP_EOL;
            sleep(1);
            while ($deck->calculateCardValue($deck->getComputerHand()) <= 17) {
                $deck->dealComputer();
                echo 'Dealer takes another card:' . PHP_EOL;
                sleep(1);
                echo 'Dealer cards: ' . PHP_EOL;
                foreach ($deck->getComputerHand() as $card) {
                    [$value, $suit] = $card;
                    echo $value . ' of ' . $suit . PHP_EOL;
                }
                echo 'Total card value: ' . $deck->calculateCardValue($deck->getComputerHand()) . PHP_EOL;
                echo PHP_EOL;
            }
            if ($deck->calculateCardValue($deck->getComputerHand()) == $deck->calculateCardValue($deck->getPlayerHand())) {
                echo 'IT IS A DRAW!' . PHP_EOL;
                break;
            }

            if ($deck->calculateCardValue($deck->getComputerHand()) > 21) {
                echo 'PLAYER WON!' . PHP_EOL;
                exit;
            }

            if ($deck->calculateCardValue($deck->getPlayerHand()) > $deck->calculateCardValue($deck->getComputerHand())) {
                echo 'PLAYER WON!' . PHP_EOL;
            }
            if ($deck->calculateCardValue($deck->getPlayerHand()) < $deck->calculateCardValue($deck->getComputerHand())) {
                echo 'DEALER WON!' . PHP_EOL;
            }
            break;
        case 2:
            exit;
    }
}


