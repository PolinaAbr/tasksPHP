<?php

for ($i = 1000; $i < 10000; $i++) {
    $result = false;
    $number = $i;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        $newNum = $number;
        while ($newNum > 0) {
            $numeral2 = $newNum % 10;
            $newNum = floor($newNum / 10);
            if ($numeral === $numeral2) {
                $result = true;
            }
        }
    }
    if (!$result) {
        echo $i."<br>";
    }
}