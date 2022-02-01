<?php


$randomIntegers = range(1,100);
shuffle($randomIntegers);

echo 'Array 1: ';

for ($i=0; $i < 10; $i++){
    if($i==9){
        echo -7;
    } else {
        echo $randomIntegers[$i].' ';
    }
}
echo PHP_EOL;


$copyOfRandomIntegers = new ArrayObject($randomIntegers);
$copiedIntegers = $copyOfRandomIntegers->getArrayCopy();

echo 'Array 2: ';

for ($i=0; $i < 10; $i++){
    echo $copiedIntegers[$i].' ';
}
echo PHP_EOL;


//$copyOfRandomIntegers = array_replace([],$randomIntegers);