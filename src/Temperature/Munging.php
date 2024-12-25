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
        private Collection $collection)
    {
    }

    /**
     * @return int day number with the smallest temperature spread
     */
    public function minimalTemperatureSpreadDay(): int
    {
        $weatherDataLineWithMaxSpread =  $this->collection->reduce(
            fn(?DayData $dataLineWithMaximumSpread, DayData $dataLine): DayData => is_null($dataLineWithMaximumSpread) || $dataLine->spread() < $dataLineWithMaximumSpread->spread()
                ? $dataLine
                : $dataLineWithMaximumSpread);

        return $weatherDataLineWithMaxSpread->day;
    }
}
