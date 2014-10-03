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

    public function __construct($a, $b)
    {
        if (!is_numeric($a)){
            throw new Exception ('First value isn\'t numeric');
        }

        if (!is_numeric($b)) {
            throw new Exception ('Second value isn\'t numeric');
        }
        $this->a = $a;
        $this->b = $b;
    }

    public function add()
    {
        return $this->a + $this->b;
    }

    public function subtract()
    {
        return $this->a - $this->b;
    }

    public function multiply()
    {
        return $this->a * $this->b;
    }

    public function divide()
    {
        if ($this->b == 0) {
            throw new \Exception('Divizion by zero');
        }
        return $this->a / $this->b;
    }
}

$mycalc = new Calculator(12, 6);
echo $mycalc->add() . PHP_EOL; // Displays 18
echo $mycalc->multiply() . PHP_EOL; // Displays 72
echo $mycalc->subtract() . PHP_EOL; // Displays 6
echo $mycalc->divide() . PHP_EOL; // Displays 2

