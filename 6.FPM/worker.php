<?php
set_time_limit(0);

$socket = stream_socket_server("tcp://127.0.0.1:8081", $errno, $errstr);
if (!$socket) {
    die("$errstr ($errno)\n");
}

static $count = 0;


while ($conn = stream_socket_accept($socket, -1)) {
    
    for ($i = 0; $i < 30; $i++) {
        fwrite($conn, "Текущий счетчик: " . $count . "\n");
        $count++;
        usleep(200000); 
    }
    
    fclose($conn);
    echo "Соединение закрыто. Текущее значение счетчика: $count\n";
}


fclose($socket);
