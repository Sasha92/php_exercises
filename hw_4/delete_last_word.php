<?php

/*
Write a function that removes the last word from a string
Sample string : 'The quick brown fox'
Expected Output : The quick brown
*/

function deleteLastWord($string)
{
    $string = trim($string);
    $position = strrpos($string, ' ');
    $result = substr($string, 0, $position);

    return $result;
}

//echo deleteLastWord('The quick brown fox'); //The quick brown
echo deleteLastWord('String is empty last');