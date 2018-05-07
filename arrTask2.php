<?php

$array = array();
$columns = 7;
$rows = 5;
$minRow = 0;
$count = 0;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(-9, 9);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}
$minAverage = 999;
for ($i = 0; $i < $rows; $i++) {
    $sum = 0;
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] > 0) {
            $sum += $array[$i][$j];
            $count++;
        }
    }
    $average = $sum / $count;
    if ($average < $minAverage) {
        $minAverage = $average;
        $minRow = $i;
    }
}
echo "Номер строки, среднее  арифметическое  положительных элементов которой является наименьшим: ".$minRow;