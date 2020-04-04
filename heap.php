<?php
$a = [9, 1, 2, 4, 3, 5, 8, 6, 7];
function heapify($a, $i)
{
    $leftIndex = 2 * $i + 1;
    $rightIndex = 2 * $i + 2;
    if ($a[$i] > $a[$leftIndex]) {
        $res = $a[$i];
        $a[$i] = $a[$leftIndex];
        $a[$leftIndex] = $res;
    }
    if ($a[$i] > $a[$rightIndex]) {
        $res = $a[$i];
        $a[$i] = $a[$leftIndex];
        $a[$leftIndex] = $res;
    }
    return $a;
}

for ($i = count($a) - 1; $i > 0; --$i) {
    $a = heapify($a, ceil($i / 2) - 1);
}
var_dump($a);