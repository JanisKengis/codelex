<?php

// TicTacToe

// Combinations from file.txt

$gameFile = file_get_contents('file.txt');

$combinations = [];

[$boardBase, $combinationBase] = explode('
', $gameFile);

[$name, $combinationList] = explode(':', $combinationBase);
foreach (explode('|', $combinationList) as $combinationNumber => $combination) {
    foreach (explode(';', $combination) as $coordinateIndex => $coordinates) {
        [$row, $column] = explode(',', $coordinates);
        $combinations[$combinationNumber][$coordinateIndex] = [(int)$row, (int)$column];
    }
}

// Board from file.txt

list($title, $data) = explode(':', $boardBase);
$drawRow = str_repeat('-,', $data[0] * substr($data, -2, 1));
$drawElements = array_filter(explode(',', $drawRow));
$drawBoard = array_chunk($drawElements, $data[0]);

$board = $drawBoard;


function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }
    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

function display_board(array $field)
{
    foreach ($field as $item) {
        foreach ($item as $value) {
            echo "  $value  ";
        }
        echo PHP_EOL;
    }
}


$player1 = readline('Choose char for player one: ');
$player2 = readline('Choose char for player two: ');

$activePlayer = $player1;

display_board($board);
echo "It is {$activePlayer}`s turn!" . PHP_EOL;

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    $position = readline("Enter position ({$activePlayer}): ");
    [$row, $column] = explode(',', $position);

    if (!isset($board[$row][$column])) {
        echo 'Invalid input, please try again!' . PHP_EOL;
        continue;
    }
    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. Choose another field!' . PHP_EOL;
        continue;
    }
    $board[$row][$column] = $activePlayer;
    display_board($board);
    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
    echo "It is {$activePlayer}`s turn!" . PHP_EOL;
}

echo 'The game is a draw!';
echo PHP_EOL;