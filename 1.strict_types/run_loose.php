<?php

function sum(int $a, int $b): int
{
    return $a + $b;
}

echo "Без строгой типизации\n";

//sum("1", "2")
try {
    $result = sum("1", "2");
    echo "sum(\"1\", \"2\")\n";
    echo "Прошло успешно. Результат: $result\n";
} catch (Throwable $e) {
    echo "Упало с ошибкой типа " . get_class($e) . "\n";
    echo "Сообщение:" . $e->getMessage() . "\n";
}
echo "\n";

//sum(1.2, 2.8)
try {
    $result = sum(1.2, 2.8);
    echo "sum(1.2, 2.8)\n";
    echo "Прошло успешно. Результат: $result\n";
} catch (Throwable $e) {
    echo "Упало с ошибкой типа " . get_class($e) . "\n";
    echo "Сообщение: " . $e->getMessage() . "\n";
}
echo "\n";

//sum(null, 1)
try {
    $result = sum(null, 1);
    echo "sum(null, 1)\n";
    echo "Прошло успешно. Результат: $result\n";
} catch (Throwable $e) {
    echo "Упало с ошибкой типа " . get_class($e) . "\n";
    echo "Сообщение: " . $e->getMessage() . "\n";
}
