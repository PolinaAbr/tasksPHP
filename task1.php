<?php

$number = rand(1, 100000);
$count = countNum($number);
echo "���������� ���� ������ 5 � ����� ".$number.": ".$count;

function countNum($number) {
    $count = 0;
    $array = array();
    while ($number > 0) {
        $array[] = $number % 10; //������� ������� �� ������� �� 10 � ���������� � ������
        $number = intval($number / 10); //������� ��������� ����� � �����
    }
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] < 5) {
            $count++;
        }
    }
    return $count;
}