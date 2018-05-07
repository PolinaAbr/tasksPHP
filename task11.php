<?php

for ($number = 1 ; $number < 1000; $number++) {
    $sum = numeralsSum($number);
    if ($number % $sum === 0) {
        echo $number."<br>";
    }
}

function numeralsSum($number) {
    $sum = 0;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        $sum += $numeral;
    }
    return $sum;
}