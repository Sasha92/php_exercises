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

    public function setCelsius($degree)
    {
        $this->degree = $degree;
        $this->kelvin = null;
        $this->fahrenheit = null;
    }

    public function setKelvin($kelvin)
    {
      $this->kelvin = $kelvin;
        $this->degree = null;
        $this->fahrenheit = null;
    }

    public function setFahrenheit($fahrenheit)
    {
        $this->fahrenheit = $fahrenheit;
        $this->degree = null;
        $this->kelvin = null;
    }

    public function getCelsius()
    {
        if (isset($this->fahrenheit)) {
            return ($this->fahrenheit - 32) * 5 / 9;
        } elseif (isset($this->kelvin)) {
            return $this->kelvin - 273.15;
        } else {
            return $this->degree;
        }
    }

    public function getKelvin()
    {

        if (isset($this->kelvin)) {
            return $this->kelvin;
        } elseif (isset($this->degree)) {
            return $this->degree + 273.15;
        } else {
            return ($this->fahrenheit + 459.67) * 5 / 9;
        }
    }

    public function getFahrenheit()
    {
        if (isset($this->fahrenheit)) {
            return $this->fahrenheit;
        } elseif (isset($this->degree)) {
            return $this->degree * 9 / 5 + 32;
        } else {
            return $this->kelvin * 9 / 5 - 459.67;
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

if ($temperature->getCelsius() === 200) {
    print "Success" . PHP_EOL;
} else {
    print "Wrong value" . PHP_EOL;
}

// New check. Please think what is main problem with current Temperature class implementation
$temperature = new Temperature();
$temperature->setCelsius(200);
$temperature->setKelvin(373.15);

if ($temperature->getCelsius() === 100.0) {
    print "Success" . PHP_EOL;
} else {
    print "Wrong value" . PHP_EOL;
}