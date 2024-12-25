<?php

namespace App\Tests\Football;

use App\Temperature\DayData;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TeamTest extends TestCase
{
    /**
     * Test de base avec des températures positives
     */
    public function testSpreadWithPositiveTemperatures(): void
    {
        $weatherDataLine = new DayData(1, 30, 20);
        $this->assertSame(10, $weatherDataLine->spread());
    }

    /**
     * Test avec des températures négatives
     */
    public function testSpreadWithNegativeTemperatures(): void
    {
        $wdl = new DayData(1, 5, -5);
        $this->assertSame(10, $wdl->spread());

        $wdl = new DayData(1, -2, -12);
        $this->assertSame(10, $wdl->spread());
    }

    /**
     * Test avec une température marquée d'un astérisque
     * Dans le fichier weather.dat, certaines valeurs sont marquées avec *
     */
    public function testSpreadWithAsteriskTemperature(): void
    {
        $wdl = new DayData(9, 86, "32*");
        $this->assertSame(54, $wdl->spread());

        $wdl = new DayData(17, "81*", 57);
        $this->assertSame(24, $wdl->spread());
    }

    /**
     * Test avec des températures égales (écart nul)
     */
    public function testSpreadWithEqualTemperatures(): void
    {
        $weatherDataLine = new DayData(1, 20, 20);
        $this->assertSame(0, $weatherDataLine->spread());
    }

    /**
     * Test avec des températures inversées (max < min)
     * Devrait lancer une exception car invalide
     */
    public function testSpreadWithMaxTemperatureBellowMinimumTemperature(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $weatherDataLine = new DayData(1, 15, 20); // max < min
        $weatherDataLine->spread();
    }

    /**
     * Test avec des températures inversées (max < min)
     * Devrait lancer une exception car invalide
     */
    public function testSpreadWithInvalidTemperatures(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $weatherDataLine = new DayData(1, 'twelve', 0); // max < min
        $weatherDataLine->spread();
    }
}