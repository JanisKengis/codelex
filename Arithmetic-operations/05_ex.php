<?php


$randomNumber = rand(1, 100);

echo "I'm thinking of a number between 1-100.  Try to guess it.". PHP_EOL;
$guessedNumber = readline('>');

if ($guessedNumber < $randomNumber) {
    echo "Sorry, you are too low.  I was thinking of {$randomNumber}." . PHP_EOL;
} elseif ($guessedNumber > $randomNumber){
    echo "Sorry, you are too high.  I was thinking of {$randomNumber}." .PHP_EOL;
}else {
    echo "You guessed it!  What are the odds?!?" . PHP_EOL;
}

//$number = readline('Guess: ');

