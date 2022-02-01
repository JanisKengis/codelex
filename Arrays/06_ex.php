<?php

$listOfWords = ['window', 'christmas', 'computer', 'developer', 'programming', 'license'];

shuffle($listOfWords);
$word = $listOfWords[0];

$letters = str_split($word);

$hiddenLetters = [];
$missedLetters = [];

foreach($letters as $letter){
    $hiddenLetters[]= '_';
}

$hiddenWord = implode(' ', $hiddenLetters);

echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-'.PHP_EOL;
echo PHP_EOL;
echo 'Word: '.$hiddenWord.PHP_EOL;

while(true){

    if(strpos($hiddenWord, '_')===false){
        echo "YOU GOT IT!".PHP_EOL;
        break;
    }

    $guess = readline('Guess a letter: ');
    echo PHP_EOL;
    echo "Guess: ".$guess.PHP_EOL;

    for($i = 0; $i < count($letters); $i++){
        if($guess === $letters[$i]){
            $hiddenLetters[$i] = $guess;
        }
    }
    if (!in_array($guess, $letters)){
        $missedLetters[]=$guess;
    }

    $hiddenWord = implode(' ', $hiddenLetters);
    echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-'.PHP_EOL;
    echo PHP_EOL;
    echo 'Word: '.$hiddenWord.PHP_EOL;
    echo "Misses: ".implode(',',$missedLetters).PHP_EOL;

    if (count($missedLetters) >= 6){
        die('Sorry, You are out of guesses!'.PHP_EOL);
    }
}

