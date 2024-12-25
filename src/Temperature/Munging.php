<?php
declare(strict_types=1);

namespace App\Temperature;

/**
 * @see http://codekata.com/kata/kata04-data-munging/
 */
readonly class Munging
{
    public function __construct(
        private MonthData $weatherDataTable)
    {
    }

    /**
     * @return int day number with the smallest temperature spread
     */
    public function minimalTemperatureSpreadDay(): int
    {
        $weatherDataLineWithMaxSpread =  $this->weatherDataTable->reduce(
            fn(?DayData $dataLineWithMaximumSpread, DayData $dataLine): DayData => is_null($dataLineWithMaximumSpread) || $dataLine->spread() < $dataLineWithMaximumSpread->spread()
                ? $dataLine
                : $dataLineWithMaximumSpread);

        return $weatherDataLineWithMaxSpread->day;
    }
}
