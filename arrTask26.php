<?php

$array = array();
$nullArray = array();
$array = array(array(0, 1, 0, 0, 1), array(0, 0, 0, 0, 0), array(0, 1, 0, 0, 1), array(0, 0, 0, 0, 0));
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}

for ($i = 0; $i < count($array); $i++) {
    $nullRow = false;
    for ($j = 0; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] == 0) {
            $nullRow = true;
        } else {
            $nullRow = false;
            break;
        }
    }
    if ($nullRow) {
        $nullArray[$i] = 1;
    } else {
        $nullArray[$i] = 0;
    }
}

for ($i = 0; $i < count($nullArray) - 1; $i++){
    for ($j = 0; $j < count($nullArray) - $i - 1; $j++){
        if ($nullArray[$j] > $nullArray[$j + 1]){
            $temp = $nullArray[$j + 1];
            $nullArray[$j + 1] = $nullArray[$j];
            $nullArray[$j] = $temp;
            $temp = $array[$j + 1];
            $array[$j + 1] = $array[$j];
            $array[$j] = $temp;
        }
    }
}

echo "<br>Новый массив<br>";
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array[$i]); $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}