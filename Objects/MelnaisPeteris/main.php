<?php

require_once 'Card.php';
require_once 'Deck.php';
require_once 'Player.php';
require_once 'BlackPeter.php';


$game = new BlackPeter();
$player = new Player;
$npc = new Player;

for ($i = 0; $i < 25; $i++) {
    $player->draw($game->deal());
}

for ($i = 0; $i < 24; $i++) {
    $npc->draw($game->deal());
}


echo 'Player: ';
foreach ($player->getCards() as $card) {
    echo ' |' . $card->getDisplayValue() . '|';
}
echo PHP_EOL;
$player->disband();

echo 'Player: ';
foreach ($player->getCards() as $card) {
    echo ' |' . $card->getDisplayValue() . '|';
}
echo PHP_EOL;

echo '--------------------------------------------------------------------------------------' . PHP_EOL;

echo 'NPC: ';
foreach ($npc->getCards() as $card) {
    echo ' |' . $card->getDisplayValue() . '|';
}
echo PHP_EOL;
$npc->disband();

echo 'NPC: ';
foreach ($npc->getCards() as $card) {
    echo ' |' . $card->getDisplayValue() . '|';
}
echo PHP_EOL;

$counter = 1;

while (!$player->isWinningState() || !$npc->isWinningState())
{
    echo PHP_EOL;
    echo 'Step: ' . $counter . PHP_EOL;

    $npc->disband();
    $player->disband();

    echo PHP_EOL;
    echo 'Player: ';
    foreach ($player->getCards() as $card) {
        echo ' |' . $card->getDisplayValue() . '|';
    }
    echo PHP_EOL;

    echo '--------------------------------------------------------------------------------------' . PHP_EOL;

    echo 'NPC: ';
    foreach ($npc->getCards() as $card) {
        echo ' |' . $card->getDisplayValue() . '|';
    }
    echo PHP_EOL;

    if (count($player->getCards()) > count($npc->getCards())) {
        $randomCard = $player->getCards()[array_rand($player->getCards())];
        $npc->draw($randomCard);
        $player->remove($randomCard);

    } else if (count($player->getCards()) < count($npc->getCards())) {
        $randomCard2 = $npc->getCards()[array_rand($npc->getCards())];
        $player->draw($randomCard2);
        $npc->remove($randomCard2);

    }


    if (count($player->getCards()) == 0) {
        echo 'NPC won!' . PHP_EOL;
        exit;
    }

    if (count($npc->getCards()) == 0) {
        echo 'Player won!' . PHP_EOL;
        exit;
    }
    readline('Enter to continue');

    echo PHP_EOL;
    echo 'Player: ';
    foreach ($player->getCards() as $card) {
        echo ' |' . $card->getDisplayValue() . '|';
    }
    echo PHP_EOL;

    echo '--------------------------------------------------------------------------------------' . PHP_EOL;

    echo 'NPC: ';
    foreach ($npc->getCards() as $card) {
        echo ' |' . $card->getDisplayValue() . '|';
    }
    echo PHP_EOL;

    readline('Enter to continue');

    $counter++;
}