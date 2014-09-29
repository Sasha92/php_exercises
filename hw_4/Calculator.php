<?php
/*
Write a PHP Calculator class which will accept two values as arguments,
then add them,
subtract them,
multiply them together,
or divide them on request.
For example :
$mycalc = new MyCalculator( 12, 6);
echo $mycalc- > add(); // Displays 18
echo $mycalc- > multiply(); // Displays 72
*/

namespace hw_4;

class Calculator
{
    private $a;
    private $b;

    function __construct($a, $b)
    {
        if (is_numeric($a) && is_numeric($b)){
            $this->a = $a;
            $this->b = $b;
        }
    }

    function add()
    {
        return $this->a + $this->b;
    }

    function subtract()
    {
        return $this->a - $this->b;
    }

    function multiply()
    {
        return $this->a * $this->b;
    }

    function divide()
    {
        if ($this->b === 0) {
            return 'Divizion by zero';
        }
        return $this->a / $this->b;
    }
}

$mycalc = new Calculator(12, 6);
echo $mycalc->add() . PHP_EOL; // Displays 18
echo $mycalc->multiply() . PHP_EOL; // Displays 72
echo $mycalc->subtract() . PHP_EOL; // Displays 6
echo $mycalc->divide() . PHP_EOL; // Displays 2