<?php

// создаем массив на $len элементов
$array = array();
$len = 10;
$min = 0;
$max = 5;

for ($i = 0; $i < $len; $i++) {
    //значения массива варьируются от 0 до 5
    $array[] = mt_rand($min, $max);
}

function deleteNumberInArr ($number, $arr) {
    foreach ($arr as $key => $item) {
        if ($item == $number) {
            unset($arr[$key]);
        }
    }
    return $arr;
}

$newArray = deleteNumberInArr(5, $array);
var_dump($array);
var_dump($newArray);