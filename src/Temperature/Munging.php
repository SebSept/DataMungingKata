<?php
declare(strict_types=1);

namespace App\Temperature;

use App\Common\Collection;

/**
 * @see http://codekata.com/kata/kata04-data-munging/
 */
readonly class Munging
{
    public function __construct(
        /** @var Collection<DayData> */
        private Collection $collection)
    {
    }

    /**
     * @return int day number with the smallest temperature spread
     */
    public function minimalTemperatureSpreadDay(): int
    {
        $weatherDataLineWithMaxSpread =  $this->collection->reduce(
            fn(?DayData $dayWithMaxSpread, DayData $day): DayData => is_null($dayWithMaxSpread) || $day->spread() < $dayWithMaxSpread->spread()
                ? $day
                : $dayWithMaxSpread);

        return $weatherDataLineWithMaxSpread->day;
    }
}
