<?php

function bodyMassIndex(float $weight,float $height) {
    $bmi = $weight / pow($height/100,2);
    if($bmi > 25){
        echo 'You are overweight!'.PHP_EOL;
    } elseif($bmi <= 25 && $bmi > 18.5){
        echo 'You have optimal weight'.PHP_EOL;
    } else {
        echo 'You are underweight'.PHP_EOL;
    } return "Your BMI is ".round($bmi,2).".".PHP_EOL;
}
$weight = readline('Please enter Your weight in kilograms:');
$height = readline('Please enter Your height in centimeters:');

echo bodyMassIndex($weight, $height);