<?php

require_once 'river_crossing.php';

class Mother extends Crossing
{

    public $people = 'Mother';

    public function crossing()
    {
        parent::sitDown();
        parent::crosssing($this->people);
        parent::standUp();
    }

} 