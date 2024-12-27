<?php declare(strict_types=1);

namespace App\Football;

use Override;
use App\Common\CollectionFactory;

/**
 * @extends CollectionFactory<Team>
 */
final class TeamCollectionFactory extends CollectionFactory
{

    public function __construct()
    {
        $filterDataLines = fn(array $line): bool => count($line) === 10;
        $itemInstanciation = fn(array $dataLine): Team => new Team($dataLine[1], (int)$dataLine[6], (int)$dataLine[8]);

        parent::__construct($filterDataLines, $itemInstanciation);
    }


    #[Override]
    protected function createCollection(array $items): TeamCollection
    {
        return new TeamCollection($items);
    }
}