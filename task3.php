<?php
$number = rand(10, 1000);
$startNum = $number;
$prevNum = 10;
$result = false;
while ($number > 0) {
    $numeral = $number % 10;
    $number = floor ($number / 10);
    if ($numeral < $prevNum) {
        $result = true;
        $prevNum = $numeral;
    } else {
        $result = false;
        break;
    }
}
if ($result) {
    echo "����� ����� ".$startNum." �������� ������������ ������������������";
} else {
    echo "����� ����� ".$startNum." �� �������� ������������ ������������������";
}