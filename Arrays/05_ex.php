<?php


function display_board($field)
{
    echo " {$field[0][0]} | {$field[0][1]} | {$field[0][2]} \n";
    echo "---+---+---\n";
    echo " {$field[1][0]} | {$field[1][1]} | {$field[1][2]} \n";
    echo "---+---+---\n";
    echo " {$field[2][0]} | {$field[2][1]} | {$field[2][2]} \n";
}

function checkWinner($gameField, $player){

    if($gameField[0][0] == $gameField[0][1] && $gameField[0][1] !== ' ' && $gameField[0][1] == $gameField[0][2]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[1][0] === $gameField[1][1] && $gameField[1][1] !== ' ' && $gameField[1][1] === $gameField[1][2]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[2][0] === $gameField[2][1] && $gameField[2][1] !== ' ' && $gameField[2][1] === $gameField[2][2]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[0][0] === $gameField[1][0] && $gameField[1][0] !== ' ' && $gameField[1][0] === $gameField[2][0]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[0][1] === $gameField[1][1] && $gameField[1][1] !== ' ' && $gameField[1][1] === $gameField[2][1]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[0][2] === $gameField[1][2] && $gameField[1][2] !== ' ' && $gameField[1][2] === $gameField[2][2]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[0][0] === $gameField[1][1] && $gameField[1][1] !== ' ' && $gameField[1][1] === $gameField[2][2]){
        die($player . ' wins'.PHP_EOL);
    }
    if($gameField[0][2] === $gameField[1][1] && $gameField[1][1] !== ' ' && $gameField[1][1] === $gameField[2][0]){
        die($player . ' wins'.PHP_EOL);
    }
}


$gameField = [
    [" ", " ", " "],
    [" ", " ", " "],
    [" ", " ", " "]
];


display_board($gameField);
$player = "x";
$counter = 0;
while (true) {

        $moveX = (int)readline('Enter row coordinate (0 - 2): ');
        $moveY = (int)readline('Enter column coordinate (0 - 2): ');
        if ($gameField[$moveX][$moveY] == ' ') {
            $gameField[$moveX][$moveY] = $player;
            display_board($gameField);
            $counter++;
            checkWinner($gameField,$player);
            if ($counter == 9){
                echo 'It`s a draw!'.PHP_EOL;
                exit;
            }
            $player == "x" ? $player = "o" : $player = "x";
            echo PHP_EOL;
            echo "It is {$player}`s turn!" . PHP_EOL;
        } else {
            echo "Invalid move, pick a different field!".PHP_EOL;
        }

}




