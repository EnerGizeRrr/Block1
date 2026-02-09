<?php
$users = [];

for($i=0; $i<200000; $i++) {
    $users[$i] = ['id' => $i, 'name' => 'User'. $i];
}

$activeId = range(1, 50000);

function slowFilter($users, $activeId) {
    $filteredUser = [];
    foreach($users as $user) {
        if(in_array($user['id'], $activeId)) {
            $filteredUser[] = $user;
        }
    }
    return $filteredUser;
}

function fastFilter($users, $activeId) {
    $filteredUser = [];
    $activeSet = array_flip($activeId);
    foreach($users as $user) {
        if(isset($activeSet[$user['id']])) {
            $filteredUser[] = $user;
        }
    }
    return $filteredUser;
}

$slowStart = microtime(true);
slowFilter($users, $activeId);
$slowTime = microtime(true) - $slowStart;


$fastStart = microtime(true);
fastFilter($users, $activeId);
$fastTime = microtime(true) - $fastStart;

echo "Время медленной фильтрации пользователей = " . number_format($slowTime, 6) . " секунд\n";
echo "Время быстрой фильтрации пользователей = " . number_format($fastTime, 6) . " секунд\n";
