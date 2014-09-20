<?php
require_once 'braces_stack.php';


/**
 * @param $n
 * @param $brace
 */
function testBrace($n, $brace)
{
    $start = microtime(true);
    for ($i = 0; $i < $n; $i++) {
        isCorrect($brace);
    }

    $end = microtime(true);
    echo $end - $start;
}

testBrace(1000, generateIncorrectBraces(40000));

function generateIncorrectBraces($blocks)
{
    $string = '(}{)';
    $str = '';
    for ($i = 0; $i < $blocks; $i++) {
        $str .= $string;
    }
    return $str;
}