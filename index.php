<?php
unset($argv[0]);
$sum = 0;
foreach ($argv as $item){
    $sum += (int) $item;
}

echo $sum;