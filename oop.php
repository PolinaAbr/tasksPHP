<?php

$m1 = memory_get_usage();

class Combination {
    private $string = "";
    private $length = 0;
    private $array = array();
    private $last = array();
    private $count = 1;
    private $position = 0;
    private $max = 0;

    function __construct($string, $length) {
        $this->string = $string;
        $this->length = $length - 1;
        $this->array = range(0, $length - 1);
        $this->max = strlen($string) - 1;
        $this->last = range($this->max, $this->max - $this->length);
        $this->position = $length - 1;
    }

    function printCombinations() {
        $this->printArr();
        while ($this->array !== $this->last) {
            $this->newCombination();
            $this->printArr();
            $this->position = $this->length;
        }
    }

    private function newCombination() {
        if ($this->array[$this->position] + 1 > $this->max) {
            $this->position--;
        }
        if ($this->position == 0) {
            $this->array[$this->position] = $this->array[$this->position] + 1;
        } else {
            $this->values();
        }
        for ($i = $this->position + 1; $i < count($this->array); $i++) {
            //начинаем проверку с наименьшего значения
            $number = 0;
            $unique = false;
            for ($j = 0; $j < $i; $j++) {
                //если число не совпадает с элементом массива
                if ($number !== $this->array[$j]) {
                    $unique = true;
                } else {
                    $number++;
                    $j = -1;
                }
            }
            if ($unique) {
                $this->array[$i] = $number;
            }
        }
    }

    private function values() {
        $unique = false;
        for ($j = 0; $j < $this->position; $j++) {
            if ($this->array[$this->position] + 1 <= $this->max) {
                if ($this->array[$this->position] + 1 !== $this->array[$j]) {
                    $unique = true;
                } else {
                    $this->array[$this->position] = $this->array[$this->position] + 1;
                    $j = -1;
                }
            } else {
                $unique = false;
                $this->position--;
                $this->newCombination();
            }
        }
        if ($unique) {
            $this->array[$this->position] = $this->array[$this->position] + 1;
        }
    }

    private function printArr() {
        echo $this->count.". ";
        for ($i = 0; $i < count($this->array); $i++) {
            echo $this->string[$this->array[$i]];
        }
        echo "<br>";
        $this->count++;
    }

    public function combinationsCount($strLength, $length) {
        $count = $this->factorial($strLength) / $this->factorial($strLength - $length);
        echo $count."<br>";
    }

    private function factorial($number){
        if ($number === 0) {
            return 1;
        } else {
            return $number * $this->factorial($number - 1);
        }
    }
}

$string = "01234567";
$length = 7;
$combination = new Combination($string, $length);
$combination->combinationsCount(strlen($string), $length);
$combination->printCombinations();

$m2 = memory_get_usage();
echo round(($m2 - $m1)/8/ 1024, 2)." kb";
//0.31 kb