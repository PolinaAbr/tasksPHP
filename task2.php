<?php
$numeralSum = rand(1, 36);
echo "Числа, сумма цифр которых равна ".$numeralSum."<br>";
for ($i = 1000; $i < 10000; $i++) {
    $sum = 0;
    $number = $i;
    for ($j = 0; $j < 4; $j++) {
        $sum += $number % 10;
        $number = floor ($number / 10);
    }
    if ($numeralSum === $sum) {
        echo $i."<br>";
    }
}