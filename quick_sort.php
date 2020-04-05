<?php
$a = [2, 1, 7, 4, 9, 5, 8, 3, 6];

function partition(&$a, $li, $hi)
{
    $lfi = $li;
    $rgi = $hi;
    $m = $a[$li];
    while ($lfi < $rgi) {
        $isFinished = false;
        while (!$isFinished && $a[$lfi] < $m) {
            ++$lfi;
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
    $a = exch($a, $m, $rgi);
    return $rgi;
}

function &quickSort(&$a, $li, $ri)
{
    $mi = partition($a, $li, $ri);
    if ($mi < 0) {
        die('asd');
    }
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

$a = quickSort($a, 0, count($a) - 1);