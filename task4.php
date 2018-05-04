<?php

for ($i = 1000; $i < 10000; $i += 2) {
    $increase = true; //флаг для возрастающей последовательности
    $decrease = true; //флаг для убывающей последовательности
    $number = $i;
    $nextNum = $number % 10;
    $number = floor ($number / 10);
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor ($number / 10);
        if ($numeral < $nextNum && $increase) {
            $increase = true;
            $decrease = false;
            $nextNum = $numeral;
        } elseif ($numeral > $nextNum && $decrease) {
            $decrease = true;
            $increase = false;
            $nextNum = $numeral;
        } else {
            $increase = false;
            $decrease = false;
            break;
        }
    }
    if ($increase || $decrease) {
        echo $i."<br>";
    }
}