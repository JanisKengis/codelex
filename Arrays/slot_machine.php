<?php

function display_board(array $field)
{
    foreach ($field as $item) {
        foreach ($item as $value) {
            echo "  $value  ";
        }
        echo PHP_EOL;
    }
}

$combinations3x3 = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];

$combinations3x4 = [
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    [
        [0, 0], [1, 1], [2, 2], [2, 3]
    ],
    [
        [2, 0], [1, 1], [0, 2], [0, 3]
    ]
];

$slotField3x3 = [
    ["-", "-", "-"],
    ["-", "-", "-"],
    ["-", "-", "-"]
];

$slotField3x4 = [
    ["-", "-", "-", "-"],
    ["-", "-", "-", "-"],
    ["-", "-", "-", "-"]
];


$char1 = 'A'; // *1
$char2 = 'B'; // *2
$char3 = 'C'; // *3

$slotChars = [$char1, $char2, $char3];

function checkCombination(array $combinations, array $board, string $char): int
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

echo 'Welcome to slot machine game!' . PHP_EOL;
echo '[1] 3x3 field' . PHP_EOL;
echo '[2] 3x4 field' . PHP_EOL;
echo '[3] exit' . PHP_EOL;
$chooseFieldSize = (int)readline('Choose an option: ');

switch ($chooseFieldSize) {

    case 1:
        $balance = (int)readline('How much would You like to deposit? ');
        $bet = (int)readline('Enter Your bet: ');

        display_board($slotField3x3);
        $totalSum = $balance;

        while (true) {

            echo 'You currently have ' . $totalSum . '$' . PHP_EOL;
            readline('Press enter to spin!');

            foreach ($slotField3x3 as $row => $item) {
                foreach ($item as $column => $element) {
                    $slotField3x3[$row][$column] = $slotChars[array_rand($slotChars)];
                }
            }

            $totalSum = $totalSum - $bet;
            display_board($slotField3x3);

            if ($totalSum < $bet) {
                die('Sorry, You are out of credits' . PHP_EOL);
            }

            if (checkCombination($combinations3x3, $slotField3x3, $char1) > 0) {
                echo 'Winner is ' . $char1 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x3, $slotField3x3, $char1) . PHP_EOL;
                $totalSum = $totalSum + ($bet * checkCombination($combinations3x3, $slotField3x3, $char1));
            }

            if (checkCombination($combinations3x3, $slotField3x3, $char2) > 0) {
                echo 'Winner is ' . $char2 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x3, $slotField3x3, $char2) . PHP_EOL;
                $totalSum = $totalSum + ($bet * 2 * checkCombination($combinations3x3, $slotField3x3, $char2));
            }

            if (checkCombination($combinations3x3, $slotField3x3, $char3) > 0) {
                echo 'Winner is ' . $char3 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x3, $slotField3x3, $char3) . PHP_EOL;
                $totalSum = $totalSum + ($bet * 3 * checkCombination($combinations3x3, $slotField3x3, $char3));
            }
        }
    case 2:
        $balance = (int)readline('How much would You like to deposit? ');
        $bet = (int)readline('Enter Your bet: ');

        display_board($slotField3x4);
        $totalSum = $balance;

        while (true) {
            echo 'You currently have ' . $totalSum . '$' . PHP_EOL;
            readline('Press enter to spin!');

            foreach ($slotField3x4 as $row => $item) {
                foreach ($item as $column => $element) {
                    $slotField3x4[$row][$column] = $slotChars[array_rand($slotChars)];
                }
            }

            $totalSum = $totalSum - $bet;
            display_board($slotField3x4);

            if ($totalSum < $bet) {
                die('Sorry, You are out of credits' . PHP_EOL);
            }


            if (checkCombination($combinations3x4, $slotField3x4, $char1) > 0) {
                echo 'Winner is ' . $char1 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x4, $slotField3x4, $char1) . PHP_EOL;
                $totalSum = $totalSum + ($bet * checkCombination($combinations3x4, $slotField3x4, $char1));
            }

            if (checkCombination($combinations3x4, $slotField3x4, $char2) > 0) {
                echo 'Winner is ' . $char2 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x4, $slotField3x4, $char2) . PHP_EOL;
                $totalSum = $totalSum + ($bet * 2 * checkCombination($combinations3x4, $slotField3x4, $char2));
            }

            if (checkCombination($combinations3x4, $slotField3x4, $char3) > 0) {
                echo 'Winner is ' . $char3 . PHP_EOL;
                echo 'Lines: ' . checkCombination($combinations3x4, $slotField3x4, $char3) . PHP_EOL;
                $totalSum = $totalSum + ($bet * 3 * checkCombination($combinations3x4, $slotField3x4, $char3));
            }
        }
    case 3:
        exit;
    default:
        exit;
}