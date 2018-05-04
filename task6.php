<?php

$num1 = 0;
$num2 = 2;
$num3 = 3;
$num4 = 7;
for ($i = 1000; $i < 10000; $i++) {
    $result = false;
    $number = $i;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        if ($numeral === $num1 || $numeral === $num2 || $numeral === $num3 || $numeral === $num4) {
            $result = true;
        } else {
            $result = false;
            break;
        }
    }
    if ($result) {
        echo $i."<br>";
    }
}