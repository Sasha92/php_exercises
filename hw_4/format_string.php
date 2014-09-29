<?php

/*
 Write a function to remove all characters from a string except a-z A-Z 0-9 or " ".
Sample string : abcde$ddfd @abcd )der]
Expected Result : abcdeddfd abcd der
*/

function formatString($string)
{
    $result = '';

    preg_match_all('/(\d+|[a-zA-Z]+|\s)+/', $string, $strings);

    foreach ($strings[0] as $str) {
        $result .= $str;
    }
    return $result;
}

echo formatString('abcde$ddfd @abcd )der]'); //abcdeddfd abcd der