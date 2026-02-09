<?php
declare(strict_types=1);

interface OnlyString
{
    public function returnString(string $str): string;
}

class OnlyStringImpl implements OnlyString
{
    public function returnString(string $str): string
    {
        return $str;
    }
}

$objOnlyStr = new OnlyStringImpl();

try {
    echo $objOnlyStr->returnString(123);
} catch (Throwable $e) {
    echo "Класс ошибки: " . get_class($e) . "\n";
    echo "Сообщение ошибки: " . $e->getMessage() . "\n\n";
}


try {
    throw new RuntimeException("Ошибка выполнения времени");
} catch (Throwable $e) {
    echo "Класс ошибки:" . get_class($e) . "\n";
    echo "Сообщение ошибки:" . $e->getMessage() . "\n\n";
}

try {
    notFoundFunction();
} catch (Throwable $e) {
    echo "Класс ошибки:" . get_class($e) . "\n";
    echo "Сообщение ошибки:" . $e->getMessage() . "\n\n";
}
