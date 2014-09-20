<?php
error_reporting(~E_NOTICE);
/**
 * Есть два вида скобок, {}, (),
 * дана входная строка, состоящая из этих символов,
 * надо определить, корректна ли строка,
 * т.е. для каждой закрывающей скобки должна быть своя открывающая.
 */
function isCorrect($brace)
{
    $length = strlen($brace);
    if (empty($brace)) {
        return true;
    }

    if ($length % 2 === 1) {
        return false;
    }
    $arr = array();
    for ($i = 0, $j = 0; $i < $length; $i++)  {

        if (ord($brace[$i]) === 40 && ord($brace[$i+1]) === 125 || ord($brace[$i]) === 123 && ord($brace[$i+1]) === 41) {
           return false;
        }

        if (ord($brace[$i]) === 40 || ord($brace[$i]) === 123) {
            $arr[$j] = ord($brace[$i]);
            ++$j;
        }

        if (ord($brace[$i]) === 41 && ($arr[$j - 1] === 40 || $arr[0] === 40)) {
            array_pop($arr);
            --$j;
        }

        if (ord($brace[$i]) === 125 && ($arr[$j - 1] === 123 || $arr[0] === 123)) {
            array_pop($arr);
            --$j;
        }

        if (empty($arr)) return true;

    }
    return false;
}

assert(isCorrect('') === true);
assert(isCorrect('()') === true);
assert(isCorrect('{()}') === true);
assert(isCorrect('{()}{}') === true);
assert(isCorrect('(())') === true);
assert(isCorrect('{({({({()})})})}') === true);
assert(isCorrect('{(})') === false);