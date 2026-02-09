<?php

$x = 10;
$a = function () use ($x) {
    return $x;
};
$x = 20;
echo "Result " . $a() . "\n";

//передача по ссылке
$x = 10;
$b = function () use (&$x) {
    return $x;
};
$x = 30;
echo "Result " . $b() . "\n";