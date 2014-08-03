<?php

namespace integral;

require_once 'Rectangle.php';
require_once 'Trapeze.php';

$integral = new Rectangle ('1/(pow($i, 2)+1)', 0, 1, 4);
echo $integral ->rightRectangle() . PHP_EOL;

$integral2 = new Trapeze ('1/(pow($i, 2)+1)', 0, 1, 4);
echo $integral2->trapeze();
