<?php

function passByValue(array $a): int
{
    $value = $a[0];
    return 1;
}

function passByValueAndModify(array $a): int
{
    $a[0] = 'modified';
    return 1;
}


function passByReference(array &$a): int
{
    $a[0] = 'modified by ref';
    return 1;
}



$largeArray = range(1, 200000);


//Функция для тестов
function run_test(string $caseName, callable $testFunction)
{
    $mem_before = memory_get_peak_usage(false);
    $time_start = microtime(true);

    $testFunction(); 

    $time_end = microtime(true);
    $mem_after = memory_get_peak_usage(false);

    $time = round(($time_end - $time_start) * 1000, 3);
    $mem_before_kb = round($mem_before / 1024);
    $mem_after_kb = round($mem_after / 1024);
    $memory_string = "$mem_before_kb KB -> $mem_after_kb KB";

    printf(
        "| %-25s | %-35s | %-15s |\n",
        $caseName,
        $memory_string,
        "$time ms"
    );
}


echo '<pre>';
echo str_repeat('-', 83) . "\n";
printf("| %-29s | %-48s | %-20s |\n", "кейс", "память до/после", "время");
echo str_repeat('-', 83) . "\n";

run_test('1. passByValue (read)', fn() => passByValue($largeArray));

run_test('2. passByValueAndModify', fn() => passByValueAndModify($largeArray));

run_test('3. passByReference', function () use (&$largeArray) {
    passByReference($largeArray);
});

echo str_repeat('-', 83) . "\n";
echo '</pre>';
