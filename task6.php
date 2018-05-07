<?php

$num1 = 0;
$num2 = 2;
$num3 = 3;
$num4 = 7;
$sum = $num1 + $num2 + $num3 + $num4;
$prod = $num2 * $num3 * $num4;
for ($i = 1000; $i < 10000; $i++) {
    $number = $i;
    $numeralsSum = 0;
    $numeralsProd = 1;
    $numeral = $number % 10;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        $numeralsSum += $numeral;
        if ($numeral !== 0) {
            $numeralsProd *= $numeral;
        }
    }
    if ($numeralsSum === $sum && $numeralsProd === $prod) {
        echo $i."<br>";
    }
}