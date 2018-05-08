<?php

$array = array(array(0, 1, 0, 0, 1), array(0, 0, 0, 0, 0), array(0, 1, 0, 0, 1), array(0, 0, 0, 0, 0));
$columns = count($array[0]);
$rows = count($array);
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if ($j == $columns - 1) {
            echo $array[$i][$j]."<br>";
        } else {
            echo $array[$i][$j]." ";
        }
    }
}

$nullRow = false;
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        if ($array[$i][$j] == 0) {
            $nullRow = true;
        } else {
            $nullRow = false;
            break;
        }
    }
    if ($nullRow) {
        unset($array[$i]);
    }
}
print_r($array);