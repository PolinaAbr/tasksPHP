<?php

$array = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(-99, 99);
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}

$array = transpMatrix($array, $columns, $rows);
for ($i = 0; $i < $columns; $i++) {
    $minus = array();
    $min = 99;
    for ($j = 0; $j < $rows; $j++) {
        if ($array[$i][$j] < 0) {
            $minus[] = $j;
        }
        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
        }
    }
    if ($minus) {
        $array[$i] = insertElement($array[$i], $minus[0] + 1, $min);
    } else {
        $array[$i] = insertElement($array[$i], 0, $min);
    }
}
$array = transpMatrix($array, $rows + 1, $columns);

echo "<br>Новый массив:<br>";
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        echo $array[$i][$j] . " ";
    }
    echo "<br>";
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
            if ($matrix[$i][$j] == null) {
                unset($matrix[$i][$j]);
            }
        }
    }
    return $matrix;
}