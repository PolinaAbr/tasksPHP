<?php

$string = "01234";
$length = 3;
//вычисляем количество возможных комбинаций
$count = factorial(strlen($string)) / factorial(strlen($string) - $length);

$array = array();
$last = array();
$max = strlen($string) - 1;
$row = 1;

//заполняем первую строку массива индексами первой комбинации
for ($i = 0; $i < $length; $i++) {
    $array[0][$i] = $i;
    $last[] = $max - $i;
}

//пока массив не будет заполнен числом строк $count
for (;;) {
    //указатель на последнем элементе комбинации
    $position = $length - 1;
    $array[$row] = combination($array[$row - 1], $position, $max);
    if ($array[$row] == $last) {
        break;
    }
    $row++;
}
//вывод всех полученных комбинаций
for ($i = 0; $i <= $row; $i++) {
    echo $i + 1;
    echo ". ";
    for ($j = 0; $j < $length; $j++) {
        echo $string[$array[$i][$j]];
    }
    echo "<br>";
}

function combination($prev, $position, $max) {
    if ($prev[$position] + 1 > $max) {
        $position--;
    }
    if ($position == 0) {
        $new[$position] = $prev[$position] + 1;
    } else {
        $a = 1;
        $new = unique($prev, $position, $a, $max);
    }
    //цикл для проверки на уникадьность значения
    for ($i = $position + 1; $i < count($prev); $i++) {
        //начинаем проверку с наименьшего значения
        $number = 0;
        $new[$i] = after_position($i, $new, $number);
    }
    return $new;
}

function unique($prev, $position, $a, $max) {
    $result = false;
    $new = array();
    for ($j = 0; $j < $position; $j++) {
        $new[$j] = $prev[$j];
    }
    if ($prev[$position] + $a <= $max) {
        //цикл для проверки на уникальность значения
        for ($j = 0; $j < $position; $j++) {
            if ($prev[$position] + $a !== $new[$j]) {
                $result = true;
            } else {
                $a++;
                return unique($prev, $position, $a, $max);
            }
        }
        if ($result) {
            $new[$position] = $prev[$position] + $a;
            return $new;
        }
    } else {
        $position--;
        return combination($prev, $position, $max);
    }
}

//заполнение массива после установленной позиции
function after_position($i, $array, $number) {
    $result = false;
    for ($j = 0; $j < $i; $j++) {
        //если число не совпадает с элементом массива
        if ($number !== $array[$j]) {
            $result = true;
        } else {
            $result = false;
            break;
        }
    }
    if ($result) {
        return $number;
    } else {
        return after_position($i, $array, $number + 1);
    }
}

//функция нахождения факториала числа
function factorial($number){
    if ($number === 0) {
        return 1;
    } else {
        return $number * factorial($number - 1);
    }
}

var_dump(memory_get_usage());