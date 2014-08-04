<?php

// Create Temperature class that should have following methods:
// getKelvin() - Returns temperature in Kelvin
// getCelsius() - Returns temperature in Celsius
// getFahrenheit() - Returns temperature in Fahrenheit
// SetKelvin($degree) - sets temperature value in Kelvin
// SetCelsius($degree) - sets temperature value in Celsius
// SetFahrenheit($degree) - sets temperature value in Fahrenheit
class Temperature
{
    private $degree;
    private $kelvin;
    private $fahrenheit;
    public $celsius;
    public $kelvin2;
    public $fahrenheit2;

    public function setCelsius($degree)
    {
        $this->degree = $degree;
    }

    public function setKelvin($degree)
    {
        $this->kelvin = $degree;
    }

    public function setFahrenheit($degree)
    {
        $this->fahrenheit = $degree;
    }

    public function getCelsius($celsius = null)
    {
        $this->celsius = $celsius;
        if (!is_null($this->celsius)) {
            return $this->celsius;
        } elseif (isset($this->kelvin)) {
            return $this->kelvin - 273.15;
        } elseif (isset($this->fahrenheit)) {
            return ($this->fahrenheit - 32) * 5 / 9;
        } else {
            return $this->degree;
        }
    }

    public function getKelvin($kelvin2 = null)
    {
        $this->kelvin2 = $kelvin2;
        if (!is_null($this->kelvin2)) {
            return $this->kelvin2;
        } elseif (isset($this->degree)) {
            return $this->degree + 273.15;
        } elseif (isset($this->fahrenheit)) {
            return ($this->fahrenheit + 459.67) * 5 / 9;
        } else {
            return $this->kelvin;
        }
    }

    public function getFahrenheit($fahrenheit2 = null)
    {
        $this->fahrenheit2 = $fahrenheit2;
        if (!is_null($this->fahrenheit2)) {
            return $this->fahrenheit2;
        } elseif (isset($this->degree)) {
            return $this->degree * 9 / 5 + 32;
        } elseif (isset($this->kelvin)) {
            return $this->kelvin * 9 / 5 - 459.67;
        } else {
            return $this->fahrenheit;
        }
    }

}

// The following check should pass after implementing temperature class
$temperature = new Temperature();
$temperature->setCelsius(100);

if (
    $temperature->getCelsius() === 100 &&
    $temperature->getFahrenheit() == 212 &&
    $temperature->getKelvin() == 373.15
) {
    print "Success" . PHP_EOL;
} else {
    print "Wrong value" . PHP_EOL;
}

// Another one check that show problems in current implementation
$temperature = new Temperature();
$temperature->setKelvin(373.15);
$temperature->setCelsius(200);

if ($temperature->getCelsius(200) === 200) {
    print "Success" . PHP_EOL;
} else {
    print "Wrong value" . PHP_EOL;
}

