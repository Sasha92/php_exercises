<?php

require_once 'river_crossing.php';
require_once 'Children.php';

class Son extends Children
{

    public $position_coast;
    public $data;

    public function cross()
    {
        parent::sitDown();
        $this->position_coast = 'left';
        $this->data .= "Son  crossing the river. (Now he is  on the {$this->position_coast} coast) " . PHP_EOL;
        parent::standUp();
    }

} 