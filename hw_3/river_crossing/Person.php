<?php

namespace river_crossing;

class Person
{
    public $person;
    public $positionCoast = 'left';
    public $personType;

    public function __construct($person)
    {
        if (!is_string($person)) {
            throw new \Exception ('Value isn\'t string');
        }
        $this->person = $person;
    }

    public function setPositionCoast($positionCoast)
    {
        $this->positionCoast = $positionCoast;
    }

    public function getPositionCoast()
    {
        return $this->positionCoast;
    }
} 