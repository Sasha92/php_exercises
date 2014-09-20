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

    for ($i = 0; $i < $length / 2; $i++) {
        $brace = str_replace(['()', '{}'], '', $brace);
        if ($brace === '') return true;
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