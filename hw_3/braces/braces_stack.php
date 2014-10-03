<?php
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

        if ($brace[$i] === '(' &&  $brace[$i+1] === '}' || $brace[$i] === '{' &&  $brace[$i+1] === ')') {
           return false;
        }

        if ($brace[$i] === '(' || $brace[$i] === '{') {
            $arr[$j] = $brace[$i];
            ++$j;
        }

        if ($brace[$i] === ')' && ($arr[$j - 1] === '(' || $arr[0] === '(')) {
            array_pop($arr);
            --$j;
        }

        if ($brace[$i] === '}' && ($arr[$j - 1] === '{' || $arr[0] === '{')) {
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