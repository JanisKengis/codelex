<?php

$playersCount = 4;
$trackLength = 15;
$track = array_fill(0,$playersCount, array_fill(0,$trackLength, '_'));

$winners = [];
$places = [];

echo 'Player [0]'.PHP_EOL;
echo 'Player [1]'.PHP_EOL;
echo 'Player [2]'.PHP_EOL;
echo 'Player [3]'.PHP_EOL;

$playerChoice = (int)readline('Choose Player to bet on(0-3): ');
$bet = (int)readline('Place Your bet: ');

for ($x=0; $x < $playersCount; $x++){
    $track[$x][0] = 'X';
}

for ($y = 0; $y < 12; $y++)

{
    foreach ($track as $index => $line) {
        echo "Player [{$index}]";
        foreach ($line as $dash) {
            echo " $dash";
        }
        echo PHP_EOL;
    }

    sleep(1);

    foreach($track as $index => $line){
        $x = array_search('X', $line);
        if($x == count($line)-1){
            $winners[$y][] = $index;
            continue;
        }

        if($x == 13){
            $nextMove = $x+1;
        } else {
            $nextMove = $x + rand(1,3);
        }
        $track[$index][$nextMove] = 'X';
        $track[$index][$x] = '_';
    }
    echo PHP_EOL;
}

foreach($winners as $index =>$finisher){
    $places[]=$finisher;
}

foreach($places as $index => $place) {
    if ($index == 0) {
        echo 'Winner is Player: ' . implode(' and ', $place).PHP_EOL;
    }
}


if(in_array($playerChoice, $places[0])){
    echo 'Congratulations! You won '.($bet*10).' $'.PHP_EOL;
} else {
    echo 'Better luck next time!'.PHP_EOL;
}
