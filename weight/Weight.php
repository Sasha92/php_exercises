<?php

class Weight
{
    const POUNDS_TO_KILLOGRAMS = 0.45;

    private $killograms;

    public function getKillograms()
    {
        return $this->killograms;
    }

    public function getPounds()
    {
        return $this->killograms / self::POUNDS_TO_KILLOGRAMS;
    }

    public function setKillograms($killograms)
    {
        $this->killograms = $killograms;
    }

    public function setPounds($pounds)
    {
        $this->killograms = $pounds * self::POUNDS_TO_KILLOGRAMS;
    }
} 