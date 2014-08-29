<?php

class Children extends Crossing
{

    public $people = 'children';
    public $position_coast = 'left';
    public $position_boat;

    public function sitDown()
    {
        return $this->position_boat = 1;
    }

    public function standUp()
    {
        return $this->position_boat = 0;
    }

    function crossing()
    {
        parent::crosssing($this->people);
    }

    public function crossToRight()
    {
        return $this->position_coast = 'right';
    }
} 