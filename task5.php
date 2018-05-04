<?php

$number = rand(100, 10000);
echo "Исходное число: ".$number."<br>";
$newNum = 0;
while ($number > 0) {
    $numeral = $number % 10;
    $number = floor($number / 10);
    $newNum = $newNum * 10 + $numeral;
}
echo "Полученное число: ".$newNum;