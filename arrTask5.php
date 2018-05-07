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

if ($columns < $rows) {
    for ($i = 0; $i < $rows; $i++) {
        for ($j = $columns; $j < $rows; $j++) {
            $array[$i][$j] = 0;

        }
    }
    $columns = $rows;
} else {
    for ($i = $rows; $i < $columns; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $array[$i][$j] = 0;
        }
    }
    $rows = $columns;
}

$divisor = 2;
$result = false;
for ($i = 0; $i < $rows; $i++) {
    $sum = 0;
    for ($j = 0; $j < $columns; $j++) {
        $remainder = $array[$j][$i] % $divisor;
        if ($remainder === 0) {
            $result = true;
        } else {
            $result = false;
            break;
        }
        $sum += $array[$j][$i];
    }
    if ($result) {
        echo $sum."<br>";
    }
}