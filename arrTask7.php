<?php

$array = array();
$size = 5;
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        $array[$i][$j] = rand(10, 99);
        if ($j == $size - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

$maxTop = 0;
$maxBottom = 0;
$rowTop = 0;
$columnTop = 0;
$rowBottom = 0;
$columnBottom = 0;
for ($i = 0; $i < $size; $i++) {
    $middle = $i;
    for ($j = 0; $j < $size; $j++) {
        if ($j > $middle) {
            if ($array[$i][$j] > $maxTop) {
                $maxTop = $array[$i][$j];
                $rowTop = $i;
                $columnTop = $j;
            }
        } elseif ($j < $middle) {
            if ($array[$i][$j] > $maxBottom) {
                $maxBottom = $array[$i][$j];
                $rowBottom = $i;
                $columnBottom = $j;
            }
        }
    }
}
$temp = $array[$rowTop][$columnTop];
$array[$rowTop][$columnTop] = $array[$rowBottom][$columnBottom];
$array[$rowBottom][$columnBottom] = $temp;

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if ($j == $size - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}