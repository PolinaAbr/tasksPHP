<?php

$string = "0123";
$strlen = strlen($string);
$length = 4;
$array = array();
$result = false;
$res = false;
$count = factorial($strlen) / factorial($strlen - $length);
echo "Количество возможных комбинаций без повторений: ".$count."<br>";


if ($length === 1) {
    for ($i = 0; $i < strlen($string); $i++) {
        echo $string[$i];
    }
} elseif ($length === 2) {
    for ($i = 0; $i < strlen($string); $i++) {
        for ($j = 0; $j < strlen($string); $j++) {
            if ($i !== $j) {
                echo $string[$i] . $string[$j] . "<br>";
            }
        }
    }
} else {
    for ($i = 0; $i < $length; $i++) {
        $array[0][$i] = $i;
    }
    $max = strlen($string) - 1;
    $row = 1;
    while (count($array) < $count) {
        $position = $length - 1;
        b: if ($array[$row - 1][$position] + 1 > $max) {
            $position--;
        }
        if ($position < 0) {
            $position = $length - 1;
        }
        if ($position == 0) {
            $array[$row][$position] = $array[$row - 1][$position] + 1;
        } else {
            for ($j = 0; $j < $position; $j++) {
                $array[$row][$j] = $array[$row - 1][$j];
            }
            $array[$row][$position] = $array[$row - 1][$position];
            $a = 1;
            c: if ($array[$row][$position] + $a <= $max) {
                for ($j = 0; $j < $position; $j++) {

                    if ($array[$row][$position] + $a !== $array[$row][$j]) {
                        $res = true;
                    } else {
                        $res = false;
                        $a++;
                        goto c;
                    }
                }
            } else {
                $position--;
                goto b;
            }
            if ($res) {
                $array[$row][$position] = $array[$row][$position] + $a;
            } else {
                $position--;
                goto b;
            }
        }
        for ($i = $position + 1; $i < $length; $i++) {
            $number = 0;
            a: for ($j = 0; $j < $i; $j++) {
                if ($number !== $array[$row][$j]) {
                    $result = true;
                } else {
                    $result = false;
                    break;
                }
            }
            if ($result) {
                $array[$row][$i] = $number;
            } else {
                $number++;
                goto a;
            }
        }
        $row++;
    }
}

for ($i = 0; $i < $count; $i++) {
    echo $i + 1;
    echo ". ";
    for ($j = 0; $j < $length; $j++) {
        echo $string[$array[$i][$j]];
    }
    echo "<br>";
}

function factorial($number){
    if ($number === 0) {
        return 1;
    } else {
        return $number * factorial($number - 1);
    }
}