<?php

namespace App\Tests\Temperature;

use App\Temperature\Munging;
use App\Temperature\MonthDataFactory;
use PHPUnit\Framework\TestCase;

class TemperatureMungingTest extends TestCase
{

    /**
     * Day 14 is the day with the minimal Temperature spread
     */
    public function testMinimalTemperatureSpreadDay(): void
    {
        $monthDataFactory = new MonthDataFactory();
        $dataMunging = new Munging($monthDataFactory->fromFile(__DIR__ . '/stubs/weather.dat'));
        $this->assertSame(14, $dataMunging->minimalTemperatureSpreadDay());
    }
}
