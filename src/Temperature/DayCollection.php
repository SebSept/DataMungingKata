<?php declare(strict_types=1);

namespace App\Temperature;

use App\Common\Collection;
use App\Common\CollectionInterface;

/**
 * @extends Collection<DayData>
 */
readonly class DayCollection extends Collection implements CollectionInterface
{
    public function __construct(array $items)
    {
        parent::__construct($items, DayData::class);
    }

}