<?php

$number = rand(1, 100000);
$count = countNum($number);
echo "Количество цифр меньше 5 в числе ".$number.": ".$count;

function countNum($number) {
    $count = 0;
    $array = array();
    while ($number > 0) {
        $array[] = $number % 10; //находим остаток от деления на 10 и записываем в массив
        $number = intval($number / 10); //убираем последнюю цифру с числа
    }
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] < 5) {
            $count++;
        }
    }
    return $count;
}