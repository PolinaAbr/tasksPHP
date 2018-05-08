<?php

$array = array();
$columns = 7;
$rows = 5;
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

$array = transpMatrix($array, $columns, $rows);
$index = 0;
$minCount = 99;
for ($i = 0; $i < $columns; $i++) {
    $count = 0;
    for ($j = 1; $j < $rows; $j++) {
        if ($array[$i][$j] % 2 !== 0) {
            $count++;
        }
    }
    if ($count < $minCount) {
        $index = $i;
        $minCount = $count;
    }
}

$newArray = array();
for ($i = 0; $i < $columns; $i++) {
    if ($i !== $index) {
        $newArray[] = $array[$i];
    }
}
$newArray[] = $array[$index];
$newArray = transpMatrix($newArray, $rows, $columns);

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if ($j == $columns - 1) {
            echo $newArray[$i][$j] . "<br>";
        } else {
            echo $newArray[$i][$j] . " ";
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
            if ($matrix[$i][$j] === null) {
                unset($matrix[$i][$j]);
            }
        }
    }
    return $matrix;
}