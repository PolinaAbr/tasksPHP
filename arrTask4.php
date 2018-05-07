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

$num1 = 0;
$num2 = 1;
$num3 = 3;
$num4 = 8;
$sumElem = 0;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $number = $array[$i][$j];
        while ($number > 0) {
            $numeral = $number % 10;
            $number = floor($number / 10);
            $newNum = $number;
            if ($numeral === $num1 || $numeral === $num2 || $numeral === $num3 || $numeral === $num4) {
                $result = true;
            } else {
                $result = false;
                break;
            }
        }
        if ($result) {
            $sumElem += $array[$i][$j];
        }
    }
}
echo $sumElem;