<?php

$moves = ['rock', 'paper', 'scissors', 'lizard', 'spock'];
shuffle($moves);
$computerMove = $moves[0];


$playerMove = readline('Enter Your move(rock, paper, scissors, lizard, spock): ');


echo 'Player: '.$playerMove.' vs Computer: '.$computerMove.PHP_EOL;



$winningCombinations = [
    'rock'=>['scissors', 'lizard'],
    'paper'=>['rock', 'spock'],
    'scissors'=>['paper', 'lizard'],
    'lizard'=>['spock', 'paper'],
    'spock'=> ['scissors', 'rock']
];


if($playerMove===$computerMove){
    echo 'It`s a draw!'.PHP_EOL;
    $winner = 'draw';
    $scoreSheet = [$playerMove, $computerMove, $winner];
    file_put_contents('results.csv',PHP_EOL.implode(',',$scoreSheet), FILE_APPEND);
    exit;
}


if(in_array($computerMove,$winningCombinations[$playerMove])){
    echo 'Player won!'.PHP_EOL;
    $winner = 'Player won';
} else {
    echo 'Computer won!'.PHP_EOL;
    $winner = 'Computer won';
}

$scoreSheet = [$playerMove, $computerMove, $winner];
file_put_contents('results.csv',PHP_EOL.implode(',',$scoreSheet), FILE_APPEND);