<?php

$maxNumber = 100;
$resultNum = false;
$resultSquare = false;
for ($number = 1; $number < $maxNumber; $number++) {
    $reverseNum = reverseNumber($number);
    $resultNum = palindrome($number, $reverseNum);
    if ($resultNum) {
        $square = $number * $number;
        $reverseSquare = reverseNumber($square);
        $resultSquare = palindrome($square, $reverseSquare);
    }
    if ($resultNum && $resultSquare) {
        echo $number."<br>";
    }
}

function reverseNumber($number) {
    $reverseNum = 0;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        $reverseNum = $reverseNum * 10 + $numeral;
    }
    return $reverseNum;
}

function palindrome($number, $reverseNum) {
    $result = false;
    while ($number > 0) {
        $numeral = $number % 10;
        $number = floor($number / 10);
        $numeralReverse = $reverseNum % 10;
        $reverseNum = floor($reverseNum / 10);
        if ($numeral === $numeralReverse) {
            $result = true;
        } else {
            $result = false;
        }
    }
    return $result;
}