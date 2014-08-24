<?php
/**
 * Есть два вида скобок, {}, (),
 * дана входная строка, состоящая из этих символов,
 * надо определить, корректна ли строка,
 * т.е. для каждой закрывающей скобки должна быть своя открывающая.
 */
function isCorrect()
{
    // write code here
}

assert(isCorrect('') === true);
assert(isCorrect('()') === true);
assert(isCorrect('{()}') === true);
assert(isCorrect('{()}{}') === true);
assert(isCorrect('(())') === true);
assert(isCorrect('{({({({()})})})}') === true);
assert(isCorrect('{(})') === false);