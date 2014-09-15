<?php
/*
 * Написать функцию преобразования строки, содержащей число в
 * непосредственно число, не используя стандартные функции приведения типов
 * (например “1252абв” в 1252)
 */

function convertStringInNumber($str)
{
    $n = strlen($str);
    if ($n > 0) {
        preg_match_all("/\d+/", $str, $numbers);
        foreach ($numbers as $number) {
            foreach ($number as $num)
                return $num;
        }
    }
}

assert((convertStringInNumber('1252abc') == 1252));