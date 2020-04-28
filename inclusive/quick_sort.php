<?php
$a = [2, 1, 7, 4, 2, 9, 5, 8, 2, 3, 2, 6];
//$a = range(1, 1000);
//shuffle($a);

function partition(&$a, $li, $hi)
{
    $lfi = $li;
    $rgi = $hi;
    $m = $a[$li];
    while ($lfi < $rgi) {
        $isFinished = false;
        while (!$isFinished && $a[++$lfi] < $m) {
            $isFinished = ($lfi == $hi);
        }
        $isFinished = false;
        while (!$isFinished && $a[$rgi] > $m) {
            --$rgi;
            $isFinished = ($rgi == $li);
        }
        if ($lfi < $rgi) {
            $a = exch($a, $lfi, $rgi);
        }
    }
    $a = exch($a, $li, $rgi);
    return $rgi;
}

function &quickSort(&$a, $li, $ri)
{
    if ($li >= $ri) {
        return $a;
    }
    $mi = partition($a, $li, $ri);
    quickSort($a, $li, $mi - 1);
    quickSort($a, $mi + 1, $ri);
    return $a;
}

function &exch(&$a, $i, $j)
{
    $res = $a[$i];
    $a[$i] = $a[$j];
    $a[$j] = $res;
    return $a;
}

$timestamp = microtime(true);
$a = quickSort($a, 0, count($a) - 1);
var_dump($a);
//var_dump(microtime(true) - $timestamp);