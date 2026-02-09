<?php
declare(strict_types=1);

function sum(int $a, int $b): int
{
    return $a + $b;
}

echo "Строгая типизация\n";

//sum("1", "2")
echo "sum(\"1\", \"2\")\n";
try {
    $result = sum("1", "2");
    echo "Прошло успешно. Результат: $result\n";
} catch (TypeError $e) {
    echo "Упало с ошибкой типа " . get_class($e) . "\n";
    echo "Сообщение: " . $e->getMessage() ."\n";
}
echo "\n";

//sum(1.2, 2.8)
echo "sum(1.2, 2.8)\n";
try {
    $result = sum(1.2, 2.8);
    echo "Прошло успешно. Результат: $result\n";
} catch (TypeError $e) {
    echo "Упало с ошибкой типа " . get_class($e) . "\n";
    echo "Сообщение: " . $e->getMessage() . "\n";
}
echo "\n";

//sum(null, 1)
echo "sum(null, 1)\n";
try {
    $result = sum(null, 1);
    echo "Прошло успешно. Результат: $result\n";
} catch (TypeError $e) {
    echo "Упало с ошибкой типа " . get_class($e) . ".\n";
    echo "Сообщение: " . $e->getMessage() . "\n";
}
