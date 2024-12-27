<?php
declare(strict_types=1);

namespace App\Temperature;

/**
 * @see http://codekata.com/kata/kata04-data-munging/
 */
readonly class Munging
{
    public function __construct(
        private DayCollection $dayCollection)
    {
    }

    /**
     * @return int day number with the smallest temperature spread
     */
    public function minimalTemperatureSpreadDay(): int
    {
        $dayData =  $this->dayCollection->reduce(
            fn(?DayData $dayWithMaxSpread, DayData $day): DayData => is_null($dayWithMaxSpread) || $day->spread() < $dayWithMaxSpread->spread()
                ? $day
                : $dayWithMaxSpread);

        return $dayData->day;
    }
}
