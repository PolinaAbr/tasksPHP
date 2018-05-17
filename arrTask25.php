<?php

$array = array();
$countArray = array();
$columns = 7;
$rows = 5;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        $array[$i][$j] = rand(0, 9);
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}

for ($i = 0; $i < $rows; $i++) {
    $count = 0;
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] > 0) {
            $count++;
        }
    }
    $countArray[$i] = $count;
}

for ($i = 0; $i < $rows; $i++) {
    $prime = false;
    $count = 0;
    for ($j = 0; $j < $columns; $j++) {
        for($x = 2; $x <= sqrt($array[$i][$j]); $x++) {
            if($array[$i][$j] === 0 || $array[$i][$j] === 1 || $array[$i][$j] % $x === 0) {
                $prime = false;
                break;
            } else {
                $prime = true;
            }
        }
        if ($prime) {
            $count++;
        }
    }
    $countArray[$i] = $count;
}

for ($i = 0; $i < count($countArray) - 1; $i++){
    for ($j = 0; $j < count($countArray) - $i - 1; $j++){
        if ($countArray[$j] > $countArray[$j + 1]){
            $temp = $countArray[$j + 1];
            $countArray[$j + 1] = $countArray[$j];
            $countArray[$j] = $temp;
            $temp = $array[$j + 1];
            $array[$j + 1] = $array[$j];
            $array[$j] = $temp;
        }
    }
}

echo "<br>Новый массив<br>";
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}