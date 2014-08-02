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