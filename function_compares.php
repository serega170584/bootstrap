<?php
$a = 1;
$b = 2;
$arr = range(0, 10000);
$time = microtime(true);
$c = 0;
foreach ($arr as $val) {
    $c += $val;
}
var_dump(microtime(true) - $time);
$time = microtime(true);
$c = array_sum($arr);
var_dump(microtime(true) - $time);