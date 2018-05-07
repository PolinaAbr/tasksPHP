<?php

$array = array();
$columns = 4;
$rows = 3;
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

$result = false;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] < 0) {
            $result = true;
        } else {
            $result = false;
            break;
        }
    }
    if ($result) {
        for ($j = 0; $j < $columns; $j++) {
            $sum = 0;
            $number = abs($array[$i][$j]);
            while ($number > 0) {
                $numeral = $number % 10;
                $number = floor($number / 10);
                $sum += $numeral;
            }
            $array[$i][$j] = $sum;
        }
    }
}

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if ($j == $columns - 1) {
            echo $array[$i][$j] . "<br>";
        } else {
            echo $array[$i][$j] . " ";
        }
    }
}