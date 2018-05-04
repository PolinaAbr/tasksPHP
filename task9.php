<?php

$number = rand(1, 100);
$startNum = $number;
$square = $number * $number;
$result = false;
while ($number > 0) {
    $numeral = $number % 10;
    $number = floor($number / 10);
    $numeralSquare = $square % 10;
    $square = floor($square / 10);
    if ($numeral === $numeralSquare) {
        $result = true;
    } else {
        $result = false;
    }
}
if ($result) {
    echo "Число ".$startNum." является автоморфным";
} else {
    echo "Число ".$startNum." не является автоморфным";
}