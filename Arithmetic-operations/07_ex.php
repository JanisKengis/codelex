<?php

//$acceleration = -9.81;
//$timeInSeconds = 10;
//$initialVelocity = 0;
//$initialPosition = 0;

function gravityFormula(float $timeInSeconds, float $initialVelocity, float $initialPosition, float $acceleration= -9.81){
    return 0.5 * $acceleration * pow($timeInSeconds, 2) + $initialVelocity + $initialPosition. ' m'. PHP_EOL;
}

echo gravityFormula(10,0,0);

