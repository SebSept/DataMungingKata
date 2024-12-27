<?php declare(strict_types=1);

namespace App\Football;

use App\Common\Collection;
use App\Common\CollectionInterface;

/**
 * @extends Collection<Team>
 */
readonly class TeamCollection extends Collection implements CollectionInterface
{
    public function __construct(array $items)
    {
        parent::__construct($items, Team::class);
    }

}