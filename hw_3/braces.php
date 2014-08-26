<?php
/**
 * Есть два вида скобок, {}, (),
 * дана входная строка, состоящая из этих символов,
 * надо определить, корректна ли строка,
 * т.е. для каждой закрывающей скобки должна быть своя открывающая.
 */
function isCorrect($brace)
{
    $n = strlen($brace);
    if (empty($brace)) {
        return true;
    } elseif ($n % 2 === 1) {
        return false;
    } elseif ($n > 0) {
        // ( - a, )-b, {-c, }-d
        $brace = str_replace('(', 'a', $brace);
        $brace = str_replace(')', 'b', $brace);
        $brace = str_replace('{', 'c', $brace);
        $brace = str_replace('}', 'd', $brace);
        for ($i = 0; $i < $n; $i++) {
            $pattern = '/ab|cd/';
            $brace = preg_replace($pattern, '', $brace);
            if ($brace === '') return true;
        }
        if ($brace !== '') {
            return false;
        }
    }
}

assert(isCorrect('') === true);
assert(isCorrect('()') === true);
assert(isCorrect('{()}') === true);
assert(isCorrect('{()}{}') === true);
assert(isCorrect('(())') === true);
assert(isCorrect('{({({({()})})})}') === true);
assert(isCorrect('{(})') === false);