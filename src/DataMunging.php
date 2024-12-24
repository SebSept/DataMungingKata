<?php
declare(strict_types=1);

namespace App;

/**
 * @see http://codekata.com/kata/kata04-data-munging/
 */
class DataMunging
{
    public function __construct(
        private readonly WeatherDataTable $weatherDataTable)
    {
    }

    /**
     * @return int day number with the smallest temperature spread
     */
    public function minimalTemperatureSpreadDay(): int
    {
        $weatherDataLineWithMaxSpread =  $this->weatherDataTable->reduce(
            fn(?WeatherDataLine $dataLineWithMaximumSpread, WeatherDataLine $dataLine): WeatherDataLine => is_null($dataLineWithMaximumSpread) || $dataLine->spread() < $dataLineWithMaximumSpread->spread()
                ? $dataLine
                : $dataLineWithMaximumSpread);

        return $weatherDataLineWithMaxSpread->day;
    }
}
