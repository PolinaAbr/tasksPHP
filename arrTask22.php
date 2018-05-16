<?php

$array = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(1, 9);
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}

$array = transpMatrix($array, $columns, $rows);
for ($i = 0; $i < $columns; $i++) {
    sort($array[$i]);
}
$array = transpMatrix($array, $rows, $columns);

echo "<br>Новый массив<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}


function mySort($array) {
    for ($i = 0; $i < count($array) - 1; $i++){
        for ($j = 0; $j < count($array) - $i - 1; $j++){
            if ($array[$j] > $array[$j + 1]){
                $temp = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            }
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