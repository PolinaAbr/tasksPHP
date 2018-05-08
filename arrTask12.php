<?php

$array = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(-99, 99);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

for ($i = 0; $i < $rows; $i++) {
    $minus = array();
    $min = 99;
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] < 0) {
            $minus[] = $j;
        }
        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
        }
    }
    if ($minus) {
        array_splice($array[$i], $minus[0] + 1, 0, $min);
    } else {
        array_splice($array[$i], 0, 0, $min);
    }
}

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j <= $columns; $j++) {
        if ($j == $columns) {
            echo $array[$i][$j] . "<br>";
        } else {
            echo $array[$i][$j] . " ";
        }
    }
}