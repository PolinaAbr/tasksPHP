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

$index = 0;
$maxCount = 0;
for ($i = 0; $i < $rows; $i++) {
    $count = 0;
    for ($j = 1; $j < $columns; $j++) {
        if ($array[$i][$j] >= 0 && $array[$i][$j - 1] < 0) {
            $count++;
        } elseif ($array[$i][$j] < 0 && $array[$i][$j - 1] >= 0) {
            $count++;
        }
    }
    if ($count > $maxCount) {
        $index = $i;
        $maxCount = $count;
    }
}

$newArray = array();
$newArray[] = $array[$index];
for ($i = 0; $i < $rows; $i++) {
    if ($i !== $index) {
        $newArray[] = $array[$i];
    }
}

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