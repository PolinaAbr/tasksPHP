<?php

$array = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(0, 3);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

$countNum = array();
for ($i = 0; $i < $rows; $i++) {
    $max = 0;
    for ($j = 0; $j < $columns; $j++) {
        $count = 0;
        for ($k = 0; $k < $columns; $k++) {
            if ($array[$i][$j] == $array[$i][$k]) {
                $count++;
            }
        }
        if ($count === 1) {
            if ($array[$i][$j] > $max) {
                $max = $array[$i][$j];
            }
        }
    }
    echo $max."<br>";
}