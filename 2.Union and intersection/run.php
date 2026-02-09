<?php
declare(strict_types=1);

echo "Union Types" . "\n";

function normalizeId(int|string $id): string
{
    if (is_int($id)) {
        return (string)$id;
    }
        return trim($id);
}

// Кейс с int
$intId = 123;
echo "Вызов normalizeId с int($intId):" . "\n";
var_dump(normalizeId($intId)); 
echo "\n";

// Кейс со string
$stringId = "  абвгд  ";
echo "Вызов normalizeId со string(\"$stringId\"):" . "\n";
var_dump(normalizeId($stringId));
echo "\n";


echo "Intersection Types" . "\n";

function countAndIterate(Countable&Iterator $obj): int
{
    $count = 0;
    foreach ($obj as $item) {
        $count++;
    }
    return $count;
}

//Реализую только интерфейся Countable
class JustCountable implements Countable
{
    private $items = ['элемент 1', 'элемент 2', 'элемент 3'];

    public function count(): int
    {
        return count($this->items);
    }
}

//Реализую  наследование ArrayIterator.
class CountableAndIterator extends ArrayIterator
{
    public function __construct()
    {
        $items = ['элемент 1', 'элемент 2', 'элемент 3'];
        parent::__construct($items);
    }
}



$justCountable = new JustCountable();
echo "Вызов countAndIterate с объектом, реализующим только Countable:" . "\n";
try {
    countAndIterate($justCountable);
} catch (TypeError $e) {
    echo "Произошла ожидаемая ошибка:" . "\n";
    echo $e->getMessage() . "\n";
}


$countableIterator = new CountableAndIterator();
echo "Вызов countAndIterate с объектом, реализующим Countable и Iterator:" . "\n";
echo "Результат: " . countAndIterate($countableIterator) . "\n";
