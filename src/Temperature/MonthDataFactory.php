<?php declare(strict_types=1);

namespace App\Temperature;

use App\Common\CollectionFactory;

/**
 * @extends CollectionFactory<DayData>
 */
final class MonthDataFactory extends CollectionFactory
{
    public function __construct()
    {
        $firstColIsANumberBetween1and30 = fn($line): bool => preg_match('/[1-3]?\d/', (string) $line[0] ) === 1;
        $itemInstanciation = fn(array $line): DayData => new DayData((int)$line[0], $line[1], $line[2]);

        parent::__construct($firstColIsANumberBetween1and30, $itemInstanciation, DayData::class);
    }

}