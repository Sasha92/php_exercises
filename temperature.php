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
    private $celcius;


    public function setCelsius($celcius)
    {
        $this->celcius = $celcius;
    }

    public function setKelvin($kelvin)
    {
      $this->celcius = $kelvin - 273.15;

    }

    public function setFahrenheit($fahrenheit)
    {
        $this->celcius = ($fahrenheit -32)*5/9;
    }

    public function getCelsius()
    {
            return $this->celcius;

    }

    public function getKelvin()
    {

            return $this->celcius + 273.15;
    }

    public function getFahrenheit()
    {
            return $this->celcius * 9 / 5 + 32;
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