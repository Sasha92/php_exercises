<?php
/*
Write a function to remove non numeric characters except comma and dot.
Sample string : '$123,34.00A'
Expected Output : 12,334.00
*/

function deleteNonNumeric($string)
{
    $string = trim($string);
    $number = '';

    preg_match_all('/(\d+|\.)+/', $string, $strings);

    foreach ($strings[0] as $str) {
        $number .= $str;
    }

    return number_format((float)$number, 2, '.', ',');
}

echo(deleteNonNumeric('$123,34.00A')); //12,334.00