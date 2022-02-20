<?php
// создаем массив на $len элементов
$array = array();
$len = 1000;
$min = 0;
$max = 100;

for ($i = 0; $i < $len; $i++) {
    //значения массива варьируются от 0 до 100
    $array[] = mt_rand($min, $max);
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

quickSort($array, 0, count($array)-1);


//Линейный поиск
function LinearSearch($myArray, $num)
{
    $countIteration = 0;
    $count = count($myArray);

    for ($i = 0; $i < $count; $i++) {
        $countIteration++;
        if ($myArray[$i] == $num) {
            echo "Количество итераций в линейном поиске: " . $countIteration . "\n";
            return $i;
        } elseif ($myArray[$i] > $num) {
            return null;
        }
    }
    return null;
}


//Бинарный поиск
function binarySearch($myArray, $num)
{

//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    $countIteration = 0;
    while ($left <= $right) {
        $countIteration++;
//находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left) / 2);
//если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            echo "Количество итераций в бинарном поиске: " . $countIteration . "\n";
            return $middle;

        } elseif ($myArray[$middle] > $num) {
//сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        } elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    return null;
}


//Интерполяционный поиск
function InterpolationSearch($myArray, $num)
{
    $start = 0;
    $last = count($myArray) - 1;
    $countIteration = 0;
    while (($start <= $last) && ($num >= $myArray[$start])
        && ($num <= $myArray[$last])) {
        $countIteration++;
        $pos = floor($start + (
                (($last - $start) / ($myArray[$last] - $myArray[$start]))
                * ($num - $myArray[$start])
            ));
        if ($myArray[$pos] == $num) {
            echo "Количество итераций в интерполяционном поиске: " . $countIteration . "\n";
            return $pos;
        }

        if ($myArray[$pos] < $num) {
            $start = $pos + 1;
        } else {
            $last = $pos - 1;
        }
    }
    return null;
}


echo LinearSearch($array, 10) . "\n_______\n";
echo binarySearch($array, 10) . "\n_______\n";
echo InterpolationSearch($array, 10) . "\n_______\n";