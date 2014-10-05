<?php

namespace river_crossing_better;

class Person
{
   public $name;
    public $position_boat = 0;
    public $position_coast = 'left';

    public function __construct($name)
    {
        if (!is_string($name)) {
            throw new Exception ('Value isn\'t string');
        }
        $this->name = $name;
    }
} 