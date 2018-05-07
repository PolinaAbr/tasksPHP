<?php

$array = array();
$size = 4;
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        $array[$i][$j] = rand(-9, 9);
        if ($j == $size - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

$plusRow = -1;
$result = false;
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if ($array[$i][$j] > 0) {
            $result = true;
        } else {
            $result = false;
            break;
        }
    }
    if ($result) {
        $plusRow = $i;
        break;
    }
}

$vector = array();
if ($plusRow >= 0) {
    for ($i = 0; $i < $size; $i++) {
        $vector[$i] = 0;
        for ($j = 0; $j < $size; $j++) {
            $vector[$i] += $array[$i][$j] * $array[$plusRow][$j];
        }
        echo "<br>".$vector[$i];
    }
} else {
    echo "Нет положительных рядов";
}
