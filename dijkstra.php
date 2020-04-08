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
$weights = [$vertex => 0];
$minWeightVertex = 0;
$minWeight = 0;
while ($visitedVertexes != range(0, $vertexesCount - 1)) {
    for ($i = 0; $i < $vertexesCount; ++$i) {
        if ($a[$vertex][$i] != $infinity && !in_array($i, $visitedVertexes)) {
            echo $i;
            $weights[$i] = $weights[$vertex] + $a[$vertex][$i];
            if ($weights[$i] < $minWeight) {
                $minWeight = $weights[$i];
                $minWeightVertex = $i;
            }
        }
    }
    $visitedVertexes[] = $vertex;
    sort($visitedVertexes);
    var_dump($visitedVertexes);
    var_dump($minWeightVertex);
    die('asd');
    $vertex = $minWeightVertex;
}
