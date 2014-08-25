<?php
/*
 * Написать функцию преобразования строки, содержащей число в
 * непосредственно число, не используя стандартные функции приведения типов
 * (например “1252абв” в 1252)
 */
function findNumber($str)
{
    $n = strlen($str);
    if ($n > 0) {
        preg_match_all("/\d+/", $str, $numbers);
        foreach ($numbers as $number) {
            foreach ($number as $num)
                echo $num . PHP_EOL;
        }
    }
}

findNumber('1252abc');