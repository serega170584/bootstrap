<?php
$a = [7, 1, 2, 4, 3, 5, 8, 6, 9];
function &heapify($a, $i)
{
    $isFinished = false;
    while (!$isFinished) {
        $leftIndex = 2 * $i + 1;
        $rightIndex = 2 * $i + 2;
        $largeIndex = $i;
        if ($leftIndex < count($a) && $a[$i] < $a[$leftIndex]) {
            $largeIndex = $leftIndex;
        }
        if ($rightIndex > count($a) && $a[$i] < $a[$rightIndex]) {
            $largeIndex = $rightIndex;
        }
        $a[$i] = $a[$largeIndex];
        $isFinished = ($i == $largeIndex);
        $i = $largeIndex;
    }
    return $a;
}

for ($i = ceil((count($a) - 1) / 2 - 1); $i >= 0; --$i) {
    $a = heapify($a, $i);
}
var_dump($a);
