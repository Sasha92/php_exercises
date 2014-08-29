<?php

require_once 'river_crossing.php';
require_once 'Children.php';

class Daughter extends Children
{

    public $position_coast;
    public $data;

    public function cross()
    {
        parent::sitDown();
        $this->position_coast = 'left';
        $this->data .= "Daughter crossing the river. (Now she is  on the {$this->position_coast} coast) " . PHP_EOL;
        parent::standUp();
    }

} 