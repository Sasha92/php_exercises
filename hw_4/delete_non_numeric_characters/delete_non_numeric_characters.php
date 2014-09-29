<?php
/*
Write a function to remove non numeric characters except comma and dot.
Sample string : '$123,34.00A'
Expected Output : 12,334.00
*/

function deleteNonNumeric($string)
{
    $string = trim($string);
    $length = strlen($string);

    if ($length === 0) {
        return 'String is empty';
    }

    $position_dot = strrpos($string, '.');

    $number = '';
    for ($i = 0; $i < $length; $i++) {
        if (is_numeric($string[$i]) || $i === $position_dot) {
            $number .= $string[$i];
        }
    }

    $decimals = strlen(strpbrk($number, '.')) - 1;
    return number_format((float)$number, $decimals, '.', ',');
}

echo(deleteNonNumeric('$123,34.00A')); //12,334.00