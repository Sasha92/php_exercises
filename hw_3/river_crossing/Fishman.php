<?php

require_once 'river_crossing.php';

class Fishman extends Crossing
{

    public $people = 'Fishman';

    public function crossing()
    {
        parent::sitDown();
        parent::crosssing($this->people);
        parent::standUp();
    }

} 