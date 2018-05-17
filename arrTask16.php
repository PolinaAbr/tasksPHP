<?php

$array = array();
$insertArray = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(0, 9);
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
    $insertArray[$i] = rand(10, 99);
}

$array = transpMatrix($array, $columns, $rows);
$insert = $columns;
for ($i = 0; $i < $columns; $i++) {
    for ($j = 0; $j < $rows; $j++) {
        if ($array[$i][$j] == 0) {
            $insert = $i;
            break;
        }
    }
}
$array = insertElement($array, $insert, $insertArray);
$columns = count($array);
$rows = count($array[0]);
$temp = array();
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

function insertElement($array, $position, $element) {
    $new = array();
    for ($i = 0; $i < $position; $i++) {
        $new[$i] = $array[$i];
    }
    $new[$position] = $element;
    if ($position < count($array) - 1) {
        for ($i = $position; $i < count($array); $i++) {
            $new[$i + 1] = $array[$i];
        }
    }
    return $new;
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
            if ($matrix[$i][$j] === null) {
                unset($matrix[$i][$j]);
            }
        }
    }
    return $matrix;
}