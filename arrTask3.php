<?php

$array = array();
$columns = 3;
$rows = 4;
$count = 0;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(0, 9);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}
$maxElem = 0;
$minElem = 9;
for ($i = 0; $i < $rows; $i++) {
    $increase = true;
    $decrease = true;
    $min = $array[$i][0];
    $max = $array[$i][0];
    for ($j = 1; $j < $columns; $j++) {
        if ($array[$i][$j] > $array[$i][$j - 1] && $increase) {
            $increase = true;
            $decrease = false;
        } elseif ($array[$i][$j] < $array[$i][$j - 1] && $decrease) {
            $decrease = true;
            $increase = false;
        } else {
            $increase = false;
            $decrease = false;
            $count++;
            break;
        }
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
        }
        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
        }
    }
    if ($increase || $decrease) {
        if ($max > $maxElem) {
            $maxElem = $max;
        }
        if ($min < $minElem) {
            $minElem = $min;
        }
    }
}
if ($count === $rows) {
    echo "Нет возрастающих и убывающих строк";
} else {
    echo "Минимальный элемент: ".$minElem."<br>";
    echo  "Максимальный элемент: ".$maxElem;
}
