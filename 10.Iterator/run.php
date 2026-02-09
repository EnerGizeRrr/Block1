<?php

class RangeCollection implements Iterator, Countable
{
    private $start;
    private $end;
    private $current;
    private $key;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function current(): mixed
    {
        return $this->current;
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function next(): void
    {
        $this->current++;
        $this->key++;
    }

    public function rewind(): void
    {
        $this->current = $this->start;
        $this->key = 0;
    }

    public function valid(): bool
    {
        return isset($this->current) && $this->current <= $this->end;
    }

    public function count(): int
    {
        return $this->end - $this->start + 1;
    }
}

$collection = new RangeCollection(1, 23);

foreach ($collection as $number) {
    echo $number . ' ';
}

echo PHP_EOL . 'Количество элементов: ' . count($collection);
