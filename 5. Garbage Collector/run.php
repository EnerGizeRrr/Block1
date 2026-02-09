<?php

class Node {
    public ?Node $ref = null;
}

$mode = 'no-gc'; 

foreach ($argv as $arg) {
    if (strpos($arg, '--mode=') === 0) {
        $mode = substr($arg, 7); 
        break;
    }
}


if ($mode !== 'no-gc' && $mode !== 'with-gc') {
    echo "Неверный режим '$mode'.\n";
    exit(1); 
}

gc_disable();

echo "Запуск в режиме: " . ($mode === 'with-gc' ? "с gc_collect_cycles()" : "без gc_collect_cycles()") . "\n";

for ($i = 1; $i <= 50000; $i++) {

    $a = new Node();
    $b = new Node();

    $a->ref = $b;
    $b->ref = $a;

    if ($i % 1000 == 0) {
        if ($mode === 'with-gc') {
            gc_collect_cycles();
        }
        echo "Memory usage $i iterations:" . round(memory_get_usage(true) / 1024) . "Kb" ."\n";
    }
}

