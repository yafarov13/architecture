<?php

// создаем массив на $len элементов
$array = array();
$len = 10000;
$min = 0;
$max = 100;

for ($i = 0; $i < $len; $i++) {
    //значения массива варьируются от 0 до 100
    $array[] = mt_rand($min, $max);
}

// сортировка пузырьком
function bubbleSort($array){
    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
        }
    }
    return $array;
}

// быстрая сортировка
function quickSort(&$arr, $low, $high) {
    $i = $low;
    $j = $high;
    $middle = $arr[ ( $low + $high ) / 2 ];   // middle – опорный элемент; в нашей реализации он находится посередине между low и high
    do {
        while($arr[$i] < $middle) ++$i;  // Ищем элементы для правой части
        while($arr[$j] > $middle) --$j;   // Ищем элементы для левой части
                if($i <= $j){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                    $i++; $j--;
                }
        }
    while($i < $j);

    if($low < $j){
        quickSort($arr, $low, $j);
    }

    if($i < $high){
        quickSort($arr, $i, $high);
    }
}


$start_time1 = microtime(true);
$arrayBubble = bubbleSort($array);
$end_time1 = microtime(true);


$start_time2 = microtime(true);
quickSort($array, 0, count($array)-1);
$end_time2 = microtime(true);


echo $end_time1 - $start_time1 . "\n";
echo $end_time2 - $start_time2 . "\n";


//var_dump($arrayBubble);
//var_dump($array);
