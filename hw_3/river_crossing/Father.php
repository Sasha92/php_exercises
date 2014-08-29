<?php

require_once 'river_crossing.php';

class Father extends Crossing
{

    public $people = 'Father';

    public function crossing()
    {
        parent::sitDown();
        parent::crosssing($this->people);
        parent::standUp();
    }
}

