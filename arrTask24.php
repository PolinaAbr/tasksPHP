<?php

$array = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(-9, 9);
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}

for ($i = 0; $i < $rows; $i++) {
    $array[$i] = mySort($array[$i]);
}

echo "<br>Новый массив<br>";
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}


function mySort($array) {
    for ($i = 0; $i < count($array) - 1; $i++){
        for ($j = 0; $j < count($array) - $i - 1; $j++){
            if ($array[$j] === 0) {
                $temp = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            } elseif ($array[$j + 1] === 0) {
                continue;
            } elseif ($array[$j] < $array[$j + 1]){
                $temp = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}