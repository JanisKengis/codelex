<?php

class PlayerCharacters
{
    public array $playerChars;

    public function __construct(...$playerChars)
    {
        $this->playerChars = $playerChars;
    }
}

class Board
{
    public int $rows;
    public int $columns;

    public function __construct(int $rows, int $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function drawBoard(): array
    {
        return array_fill(0, $this->rows, array_fill(0, $this->columns, '-'));
    }

    public function displayBoard(array $board)
    {
        foreach ($board as $item) {
            foreach ($item as $value) {
                echo "  $value  ";
            }
            echo PHP_EOL;
        }
    }
}

class CheckForCombinations
{
    public function checkCombination(array $combinations, array $board, string $char): int
    {
        $counter = 0;
        foreach ($combinations as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;
                if ($board[$row][$column] !== $char) {
                    break;
                }

                if (end($combination) === $item) {
                    $counter++;
                }
            }
        }
        return $counter;
    }
}

$combinations3x3 = [
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],
    [[0, 0], [1, 1], [2, 2]],
    [[2, 0], [1, 1], [0, 2]]
];

$combinations3x4 = [
    [[0, 0], [0, 1], [0, 2], [0, 3]],
    [[1, 0], [1, 1], [1, 2], [1, 3]],
    [[2, 0], [2, 1], [2, 2], [2, 3]],
    [[0, 0], [1, 1], [2, 2], [2, 3]],
    [[2, 0], [1, 1], [0, 2], [0, 3]]
];


$char = new PlayerCharacters('A', 'B', 'C');
$board = new Board(3, 4);
$combination = new CheckForCombinations();
$gameField = $board->drawBoard();

$balance = (int)readline('How much would You like to deposit? ');
$bet = (int)readline('Enter Your bet: ');

$board->displayBoard($board->drawBoard());

$totalSum = $balance;

while (true) {

    echo 'You currently have ' . $totalSum . '$' . PHP_EOL;
    readline('Press enter to spin!');

    foreach ($gameField as $rows => $item) {
        foreach ($item as $columns => $element) {
            $gameField[$rows][$columns] = $char->playerChars[array_rand($char->playerChars)];
        }
    }

    $board->displayBoard($gameField);

    $totalSum = $totalSum - $bet;

    if ($totalSum < $bet) {
        die('Sorry, You are out of credits' . PHP_EOL);
    }

    if ($combination->checkCombination($combinations3x4, $gameField, $char->playerChars[0]) > 0) {
        echo 'Winner is ' . $char->playerChars[0] . PHP_EOL;
        echo 'Lines: ' . $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[0]) . PHP_EOL;
        $totalSum = $totalSum + ($bet * $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[0]));
    }

    if ($combination->checkCombination($combinations3x4, $gameField, $char->playerChars[1]) > 0) {
        echo 'Winner is ' . $char->playerChars[1] . PHP_EOL;
        echo 'Lines: ' . $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[1]) . PHP_EOL;
        $totalSum = $totalSum + ($bet * 2 * $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[1]));
    }

    if ($combination->checkCombination($combinations3x4, $gameField, $char->playerChars[2]) > 0) {
        echo 'Winner is ' . $char->playerChars[2] . PHP_EOL;
        echo 'Lines: ' . $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[2]) . PHP_EOL;
        $totalSum = $totalSum + ($bet * 3 * $combination->checkCombination($combinations3x4, $gameField, $char->playerChars[2]));
    }
}
