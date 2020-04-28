<?php
function &generateArray($count)
{
    $a = [];
    for ($i = 0; $i < $count; ++$i) {
        for ($j = 0; $j < $count; ++$j) {
            if ($i == $j) {
                $a[$i][$j] = 0;
            } elseif ($i > $j) {
                $a[$i][$j] = $a[$j][$i] = ($i - $j < 4) ? ($i - $j) * 2 : 100000;
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

function getWeights(
    $weights,
    $a,
    $vertex,
    $infinity,
    $weight
)
{
    $keys = array_keys($weights);
    return array_combine($keys, array_map(function ($val, $key) use ($a, $vertex, $infinity, $weight) {
        if ($vertex != $key && $a[$vertex][$key] != $infinity) {
            $calcWeight = $weight + $a[$vertex][$key];
            if ($val > $calcWeight) {
                $val = $calcWeight;
            }
        }
        return $val;
    }, $weights, $keys));
}

$visitedVertexes = [];
$vertex = 0;
$vertexWeight = 0;
$infinity = 100000;
$weights = array_fill(0, $vertexesCount, $infinity);
$weight = $weights[$vertex] = 0;
$weights = getWeights($weights, $a, $vertex, $infinity, $weight);
$visitedVertexes[] = $vertex;
$visitedWeights[$vertex] = $weights[$vertex];
unset($weights[$vertex]);
asort($weights);
while ($visitedVertexes != range(0, $vertexesCount - 1)) {
    $vertex = array_keys($weights)[0];
    $weight = $weights[$vertex];
    $weights = getWeights($weights, $a, $vertex, $infinity, $weight);
    $visitedVertexes[] = $vertex;
    $visitedWeights[$vertex] = $weights[$vertex];
    unset($weights[$vertex]);
    asort($weights);
}
var_dump($visitedWeights);
var_dump($visitedVertexes);