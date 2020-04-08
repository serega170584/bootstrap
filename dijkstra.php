<?php
function &generateArray($count)
{
    $a = [];
    for ($i = 0; $i < $count; ++$i) {
        for ($j = 0; $j < $count; ++$j) {
            if ($i == $j) {
                $a[$i][$j] = 0;
            } elseif ($i > $j) {
                $a[$i][$j] = $a[$j][$i] = ($i - $j < 4) ? $i - $j : 100000;
            }
        }
    }
    return $a;
}

$a = generateArray(8);
array_map(function ($items) {
    $items = array_merge([
        implode(' ', array_fill(0, count($items), '%06d'))
    ], $items);
    echo call_user_func_array('sprintf', $items) . "\r\n";
}, $a);

