<?php
/*
 * Написать функцию преобразования строки, содержащей число в
 * непосредственно число, не используя стандартные функции приведения типов
 * (например “1252абв” в 1252)
 */

// Rename this function, findNumber isn't good self-describing name
function findNumber($str)
{
    $n = strlen($str);
    if ($n > 0) {
        preg_match_all("/\d+/", $str, $numbers);
        foreach ($numbers as $number) {
            foreach ($number as $num)
                // function should return value and not print anything
                echo $num . PHP_EOL;
        }
    }
}

findNumber('1252abc');

assert((findNumber('1252abc') === 1252));