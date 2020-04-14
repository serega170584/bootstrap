<?php
$arr = [
    1,
    '*',
    2,
    ')',
    '+',
    3,
    '*',
    4,
    ')',
    ')'
];
$key = 0;
$isContinue = true;
$visitedSignIndexes = [];
$signIndexes = [];
while ($key != count($arr)) {
    if ($arr[$key] == '+' || $arr[$key] == '*') {
        $signIndexes[] = $key;
    }
    if ($arr[$key] == ')') {
        $unvisitedSignIndexes = array_values(array_diff($signIndexes, $visitedSignIndexes));
        $unvisitedSignIndexesCount = count($unvisitedSignIndexes);
        $prevSignIndex = false;
        if ($unvisitedSignIndexesCount > 1) {
            $prevSignIndex = $unvisitedSignIndexes[$unvisitedSignIndexesCount - 2];
        }
        var_dump($arr);
        var_dump($prevSignIndex);
        $firstAfterUnvisitedVisitedSignIndex = $signIndexes[count($signIndexes) - 1];
        if ($visitedSignIndexes) {
            $firstAfterUnvisitedVisitedSignIndex = $visitedSignIndexes[0];
        }
        if ($prevSignIndex !== false) {
            $firstAfterUnvisitedVisitedSign = array_filter(array_map(function ($val) use ($prevSignIndex) {
                return ($prevSignIndex < $val) ? $val : false;
            }, $visitedSignIndexes));
            if ($firstAfterUnvisitedVisitedSign) {
                $firstAfterUnvisitedVisitedSignIndex = $firstAfterUnvisitedVisitedSign[0];
            }
        }
        $arr = array_merge(
            array_slice($arr, 0, $firstAfterUnvisitedVisitedSignIndex - 1),
            ['('],
            array_slice($arr, $firstAfterUnvisitedVisitedSignIndex - 1)
        );
        $visitedSignIndexes[] = $firstAfterUnvisitedVisitedSignIndex;
        $visitedSignIndexes = array_map(function ($val) use ($firstAfterUnvisitedVisitedSignIndex) {
            return ($firstAfterUnvisitedVisitedSignIndex <= $val) ? ++$val : false;
        }, $visitedSignIndexes);
        $signIndexes = array_map(function ($val) use ($firstAfterUnvisitedVisitedSignIndex) {
            return ($firstAfterUnvisitedVisitedSignIndex <= $val) ? ++$val : false;
        }, $signIndexes);
//        var_dump($arr);
//        var_dump($visitedSignIndexes);
//        var_dump($signIndexes);
        if ($key > 7) {
            die('asd');
        }
        ++$key;
    }
    ++$key;
}
var_dump($arr);
die('asd');
//$a = 1;
//$b = 2;
//$arr = range(0, 10000);
//$time = microtime(true);
//$c = 0;
//foreach ($arr as $val) {
//    $c += $val;
//}
//var_dump(microtime(true) - $time);
//$time = microtime(true);
//$c = array_sum($arr);
//var_dump(microtime(true) - $time);