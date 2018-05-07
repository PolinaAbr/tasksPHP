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
    $indexMax = 0;
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
            $indexMax = $j;
        }
    }
    unset($array[$i][$indexMax]);
}

print_r($array);