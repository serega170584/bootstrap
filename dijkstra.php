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

$vertexesCount = 8;
$a = generateArray($vertexesCount);
array_map(function ($items) {
    $items = array_merge([
        implode(' ', array_fill(0, count($items), '%06d'))
    ], $items);
    echo call_user_func_array('sprintf', $items) . "\r\n";
}, $a);

$visitedVertexes = [];
$vertex = 0;
$vertexWeight = 0;
$infinity = 100000;
$weights = array_fill(0, $vertexesCount, $infinity);
$weights[$vertex] = 0;
$minWeightVertex = 0;
while ($visitedVertexes != range(0, $vertexesCount - 1)) {
    $minWeight = $infinity;
    for ($i = 0; $i < $vertexesCount; ++$i) {
        if ($i != $vertex && $a[$vertex][$i] != $infinity && !in_array($i, $visitedVertexes)) {
            if ($weights[$i] > $weights[$vertex] + $a[$vertex][$i]) {
                $weights[$i] = $weights[$vertex] + $a[$vertex][$i];
            }
            if ($weights[$i] < $minWeight) {
                $minWeight = $weights[$i];
                var_dump($minWeight);
                $minWeightVertex = $i;
            }
        }
    }
    $visitedVertexes[] = $vertex;
    var_dump($visitedVertexes);
    sort($visitedVertexes);
    $vertex = $minWeightVertex;
}
//var_dump($visitedVertexes);