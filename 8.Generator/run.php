<?php

$n = 2000000;

function arraySource($n) {
    $result = [];
    for ($i = 1; $i <= $n; $i++) {
        $result[] = $i;
    }
    return $result;
}

function generatorSource($n) {
    for ($i = 1; $i <= $n; $i++) {
        yield $i;
    }
}


//Массив
$start = microtime(true);
$mem1 = memory_get_usage();

$arr = arraySource($n);
$sum1 = 0;
foreach ($arr as $num) {
    $sum1 += $num;
}

$stop = microtime(true);
$mem2 = memory_get_usage();

echo "Массив:\n";
echo "Память: " . round(($mem2 - $mem1)/1024, 2) . " KB\n";
echo "Время: " . round(microtime(true) - $start, 4) . " сек\n";
echo "Сумма: $sum1\n\n";

unset($arr);

//Генератор
$start = microtime(true);
$mem1 = memory_get_usage();

$sum2 = 0;
$generator = generatorSource($n);
foreach ($generator as $num) {
    $sum2 += $num;
}

$stop = microtime(true);
$mem2 = memory_get_usage();

echo "Генератор:\n";
echo "Память: " . round(($mem2 - $mem1)/1024, 2) . " KB\n";
echo "Время: " . round(microtime(true) - $start, 4) . " сек\n";
echo "Сумма: $sum2\n";

?>