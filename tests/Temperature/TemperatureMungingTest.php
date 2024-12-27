<?php

namespace App\Tests\Temperature;

use App\Temperature\Munging;
use App\Temperature\DayCollectionFactory;
use PHPUnit\Framework\TestCase;

class TemperatureMungingTest extends TestCase
{

    /**
     * Day 14 is the day with the minimal Temperature spread
     */
    public function testMinimalTemperatureSpreadDay(): void
    {
        $dayCollectionFactory = new DayCollectionFactory();
        $dataMunging = new Munging($dayCollectionFactory->fromFile(__DIR__ . '/stubs/weather.dat'));
        $this->assertSame(14, $dataMunging->minimalTemperatureSpreadDay());
    }
}
