<?php
$a = 1;
$b = 2;
$time = microtime(true);
$c = $a + $b;
var_dump(microtime(true) - $time);
$time = microtime(true);
$c = array_sum([1, 2]);
var_dump(microtime(true) - $time);