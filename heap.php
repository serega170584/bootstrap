<?php
$a = [2, 1, 7, 4, 9, 5, 8, 3, 6];
$a = range(1, 1000);
shuffle($a);
function &heapify(&$a, $i, $length)
{
    $isFinished = false;
    while (!$isFinished) {
        $leftIndex = 2 * $i + 1;
        $rightIndex = 2 * $i + 2;
        $largeIndex = $i;
        if ($leftIndex < $length && $a[$largeIndex] < $a[$leftIndex]) {
            $largeIndex = $leftIndex;
        }
        if ($rightIndex < $length && $a[$largeIndex] < $a[$rightIndex]) {
            $largeIndex = $rightIndex;
        }
        $isFinished = ($i == $largeIndex);
        if (!$isFinished) {
            $res = $a[$i];
            $a[$i] = $a[$largeIndex];
            $a[$largeIndex] = $res;
            $i = $largeIndex;
        }
    }
    return $a;
}

function &buildHeap(&$a, $length)
{
    for ($i = ceil(($length - 1) / 2 - 1); $i >= 0; --$i) {
        $a = heapify($a, $i, $length);
    }
    return $a;
}

$timestamp = microtime(true);
$b = $a;
$a = buildHeap($a, count($a));
for ($i = count($a) - 1; $i >= 0; --$i) {
    $res = $a[$i];
    $a[$i] = $a[0];
    $a[0] = $res;
    $a = buildHeap($a, $i);
}
//var_dump($a);
var_dump(microtime(true) - $timestamp);

$timestamp = microtime(true);
sort($b);
var_dump(microtime(true) - $timestamp);

