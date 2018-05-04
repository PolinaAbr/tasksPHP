<?php

$number = rand(1, 100000);
$compare = 5;
$count = countNum($number, $compare);
echo "Количество цифр меньше ".$compare." в числе ".$number.": ".$count;

function countNum($number, $compare) {
    $count = 0;
    while ($number > 0) {
        $numeral = $number % 10; //находим остаток от деления на 10 и записываем в переменную
        $number = floor ($number / 10); //убираем последнюю цифру с числа
        if ($numeral < $compare) {
            $count++;
        }
    }
    return $count;
}