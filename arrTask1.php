<?php

$array = array();
$size = 5;
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        $array[$i][$j] = rand(0, 9);
        if ($j == $size - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}
$sumTop = 0;
$sumMiddle = 0;
$sumBottom = 0;
for ($i = 0; $i < $size; $i++) {
    $middle = $i;
    for ($j = 0; $j < $size; $j++) {
        if ($j < $middle) {
            $sumBottom += $array[$i][$j];
        } elseif ($j === $middle) {
            $sumMiddle += $array[$i][$j];
        } else {
            $sumTop += $array[$i][$j];
        }
    }
}
echo "Сумма элементов диагонали: ".$sumMiddle."<br>Сумма элементов выше диагонали: ".$sumTop."<br>Сумма элементов ниже диагонали: ".$sumBottom;
