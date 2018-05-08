<?php

$array = array();
$size = 6;
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

$newArray = array();
$middle = $size / 2;
if ($size % 2 !==0) {
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($i < floor($middle) && $j < floor($middle)) {
                $newArray[$i + ceil($middle)][$j + ceil($middle)] = $array[$i][$j];
            } elseif ($i < floor($middle) && $j > floor($middle)) {
                $newArray[$i + ceil($middle)][$j - ceil($middle)] = $array[$i][$j];
            } elseif ($i > floor($middle) && $j < floor($middle)) {
                $newArray[$i - ceil($middle)][$j + ceil($middle)] = $array[$i][$j];
            } elseif ($i > floor($middle) && $j > floor($middle)) {
                $newArray[$i - ceil($middle)][$j - ceil($middle)] = $array[$i][$j];
            } else {
                $newArray[$i][$j] = $array[$i][$j];
            }
        }
    }
} else {
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($i < $middle && $j < $middle) {
                $newArray[$i + $middle][$j + $middle] = $array[$i][$j];
            } elseif ($i < $middle && $j >= $middle) {
                $newArray[$i + $middle][$j - $middle] = $array[$i][$j];
            } elseif ($i >= $middle && $j < $middle) {
                $newArray[$i - $middle][$j + $middle] = $array[$i][$j];
            } elseif ($i >= $middle && $j >= $middle) {
                $newArray[$i - $middle][$j - $middle] = $array[$i][$j];
            }
        }
    }
}

echo "<br>Новый массив:<br>";
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if ($j == $size - 1) {
            echo $newArray[$i][$j] . "<br>";
        } else {
            echo $newArray[$i][$j] . " ";
        }
    }
}