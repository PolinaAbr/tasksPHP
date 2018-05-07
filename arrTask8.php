<?php

$array = array();
$columns = 4;
$rows = 3;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(10, 99);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

for ($i = 0; $i < $rows; $i++) {
    $max = -1;
    $min = 999;
    $indexMax = 0;
    $indexMin = 0;
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
            $indexMax = $j;
        }
        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
            $indexMin = $j;
        }
    }
    $temp = $array[$i][$indexMax];
    $array[$i][$indexMax] = $array[$i][$indexMin];
    $array[$i][$indexMin] = $temp;
}

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($j == $columns - 1) {
                echo $array[$i][$j] . "<br>";
            } else {
                echo $array[$i][$j] . " ";
            }
        }
    }
}