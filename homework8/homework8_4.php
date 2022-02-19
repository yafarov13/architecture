<?php
function getMaxSimple($number)
{
    $i = 2;
    while ($i < floor(sqrt($number))) {
        while ($number % $i == 0) {
            $number = $number / $i;
            echo $number . "\n";
        }
        $i = $i + 1;
    }
    return $number;
}
$result = getMaxSimple(600851475143);
echo "Наибольшее простое число: " . $result;
