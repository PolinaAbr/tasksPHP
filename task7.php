<?php

$number = rand(100, 1000);
$startNum = $number;
$result = false;
while ($number > 0) {
    $numeral = $number % 10;
    $number = floor($number / 10);
    $newNum = $number;
    while ($newNum > 0) {
        $numeral2 = $newNum % 10;
        $newNum = floor($newNum / 10);
        if ($numeral === $numeral2) {
            $result = true;
        }
    }
}
if ($result) {
    echo "В числе ".$startNum." есть повторяющиеся цифры";
} else {
    echo "В числе ".$startNum." нет повторяющтхся цифр";
}