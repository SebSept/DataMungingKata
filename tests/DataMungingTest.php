<?php

namespace App\Tests;

use App\DataMunging;
use App\WeatherTableFactory;
use PHPUnit\Framework\TestCase;

class DataMungingTest extends TestCase
{

    /**
     * Day 14 is the day with the minimal Temperature spread
     */
    public function testMinimalTemperatureSpreadDay(): void
    {
        $dataMunging = new DataMunging(WeatherTableFactory::fromFile(__DIR__ . '/stubs/weather.dat'));
        $this->assertSame(14, $dataMunging->minimalTemperatureSpreadDay());
    }
}
