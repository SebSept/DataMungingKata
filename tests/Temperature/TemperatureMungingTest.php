<?php

namespace App\Tests\Temperature;

use App\Temperature\Munging;
use App\Temperature\DataTableFactory;
use PHPUnit\Framework\TestCase;

class TemperatureMungingTest extends TestCase
{

    /**
     * Day 14 is the day with the minimal Temperature spread
     */
    public function testMinimalTemperatureSpreadDay(): void
    {
        $dataMunging = new Munging(DataTableFactory::fromFile(__DIR__ . '/stubs/weather.dat'));
        $this->assertSame(14, $dataMunging->minimalTemperatureSpreadDay());
    }
}
