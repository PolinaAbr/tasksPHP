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

$array = transpMatrix($array, $columns, $rows);

$result = false;
for ($i = 0; $i < $columns; $i++) {
    for ($j = 0; $j < $rows; $j++) {
        if ($array[$i][$j] < 0) {
            $result = true;
        } else {
            $result = false;
            break;
        }
    }
    if ($result) {
        for ($j = 0; $j < $rows; $j++) {
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

$array = transpMatrix($array, $rows, $columns);

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

function transpMatrix($matrix, $columns, $rows) {
    $toSquare = false;
    if ($columns !== $rows) {
        $matrix = squareMatrix($matrix, $columns, $rows);
        $toSquare = true;
    }
    $transp = array();
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix); $j++) {
            $transp[$i][$j] = $matrix[$j][$i];
        }
    }
    if ($toSquare) {
        $transp = matrix($transp);
    }
    return $transp;
}

function squareMatrix($matrix, $columns, $rows) {
    if ($columns < $rows) {
        for ($i = 0; $i < $rows; $i++) {
            for ($j = $columns; $j < $rows; $j++) {
                $matrix[$i][$j] = null;
            }
        }
    } else {
        for ($i = $rows; $i < $columns; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $matrix[$i][$j] = null;
            }
        }
    }
    return $matrix;
}

function matrix($matrix) {
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix); $j++) {
            if ($matrix[$i][$j] == null) {
                unset($matrix[$i][$j]);
            }
        }
    }
    return $matrix;
}