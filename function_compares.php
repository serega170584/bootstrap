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
    ')'
];
$key = 0;
$visitedSignIndexes = [];
$signIndexes = [];
$openBrackets = [];
while ($key != count($arr)) {
    if ($arr[$key] == '+' || $arr[$key] == '*') {
        $signIndexes[] = $key;
        $openBrackets[$key] = $key - 1;
        if ($arr[$key - 1] == ')') {
            $openBrackets[$key] = $openBrackets[$key - 1];
        }
    }
    if ($arr[$key] == ')') {
        $signIndex = array_pop($signIndexes);
        $arr = array_merge(
            array_slice($arr, 0, $openBrackets[$signIndex]),
            ['('],
            array_slice($arr, $openBrackets[$signIndex])
        );
        ++$key;
        $openBrackets[$key] = $openBrackets[$signIndex];
    }
    ++$key;
//    if ($key > 11) {
//        var_dump($arr);
//        die('asd');
//    }
}
var_dump($arr);
die('asd');
//while ($key != count($arr)) {
//    if ($arr[$key] == '+' || $arr[$key] == '*') {
//        $signIndexes[] = $key;
//    }
//    if ($arr[$key] == ')') {
//        $unvisitedSignIndexes = array_values(array_diff($signIndexes, $visitedSignIndexes));
//        $unvisitedSignIndexesCount = count($unvisitedSignIndexes);
//        $prevSignIndex = false;
//        if ($unvisitedSignIndexesCount > 1) {
//            $prevSignIndex = $unvisitedSignIndexes[$unvisitedSignIndexesCount - 2];
//        }
//        $firstAfterUnvisitedVisitedSignIndex = false;
//        if ($prevSignIndex !== false) {
//            $firstAfterUnvisitedVisitedSign = array_filter(array_map(function ($val) use ($prevSignIndex) {
//                return ($prevSignIndex < $val) ? $val : false;
//            }, $visitedSignIndexes));
//            if ($firstAfterUnvisitedVisitedSign) {
//                $firstAfterUnvisitedVisitedSignIndex = $firstAfterUnvisitedVisitedSign[0];
//            }
//        }
//        $sliceIndex = $firstAfterUnvisitedVisitedSignIndex ?: $unvisitedSignIndexes[count($unvisitedSignIndexes) - 1];
//        $arr = array_merge(
//            array_slice($arr, 0, $sliceIndex - 1),
//            ['('],
//            array_slice($arr, $sliceIndex - 1)
//        );
//        $visitedSignIndexes[] = $sliceIndex;
//        $visitedSignIndexes = array_map(function ($val) use ($sliceIndex) {
//            return ($sliceIndex <= $val) ? ++$val : $val;
//        }, $visitedSignIndexes);
//        $signIndexes = array_map(function ($val) use ($sliceIndex) {
//            return ($sliceIndex <= $val) ? ++$val : $val;
//        }, $signIndexes);
////        var_dump($arr);
////        var_dump($visitedSignIndexes);
////        var_dump($signIndexes);
////        if ($key > 7) {
////            die('asd');
////        }
//        ++$key;
//    }
//    ++$key;
//}
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