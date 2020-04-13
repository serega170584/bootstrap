<?php
$a = 1;
$b = 2;
$time = microtime(true);
$c = 0;
foreach ([1, 2] as $val) {
    $c += $val;
}
var_dump(microtime(true) - $time);
$time = microtime(true);
$c = array_sum([1, 2]);
var_dump(microtime(true) - $time);