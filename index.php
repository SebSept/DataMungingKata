<?php declare(strict_types=1);

use App\DataMunging;
use App\WeatherTableFactory;

require_once 'vendor/autoload.php';

$processor = new DataMunging(WeatherTableFactory::fromFile(__DIR__ . '/data/weather.dat'));
echo "jour avec le plus petit écart min-max : " . $processor->minimalTemperatureSpreadDay();