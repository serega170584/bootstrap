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
while ($key != count($arr)) {
    while ($isContinue) {
        if ($arr[$key] == '+' || $arr[$key] == '*') {
            $signIndex = $key;
        }
        if ($arr[$key] == ')') {
            $arr = array_merge(
                array_slice($arr, 0, $signIndex - 1),
                ['('],
                array_slice($arr, $signIndex)
            );
            $isContinue = false;
            ++$signIndex;
            ++$key;
        }
        ++$key;
    }
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