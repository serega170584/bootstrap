<?php
$a = [7, 1, 2, 4, 3, 5, 8, 6, 9];
function &heapify(&$a, $i)
{
    $isFinished = false;
    while (!$isFinished) {
        $leftIndex = 2 * $i + 1;
        $rightIndex = 2 * $i + 2;
        $largeIndex = $i;
        if ($leftIndex < count($a) && $a[$largeIndex] < $a[$leftIndex]) {
            $largeIndex = $leftIndex;
        }
        if ($rightIndex < count($a) && $a[$largeIndex] < $a[$rightIndex]) {
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

function &buildHeap(&$a)
{
    for ($i = ceil((count($a) - 1) / 2 - 1); $i >= 0; --$i) {
        $a = heapify($a, $i);
    }
    return $a;
}

$a = buildHeap($a);
var_dump($a);
