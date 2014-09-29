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
        $result ='';
        preg_match_all("/\d+/", $str, $numbers);
        foreach ($numbers[0] as $number) {
            $result .= $number;
        }
        return $result;
    }
}

assert((convertStringInNumber('1252abc') == 1252));