<?php

$number = rand(1, 100000);
$count = countNum($number);
echo "Количество цифр меньше 5 в числе ".$number.": ".$count;

function countNum($number) {
    $count = 0;
    while ($number > 0) {
        $numeral = $number % 10; //находим остаток от деления на 10 и записываем в переменную
        $number = floor ($number / 10); //убираем последнюю цифру с числа
        if ($numeral < 5) {
            $count++;
        }
    }
    return $count;
}