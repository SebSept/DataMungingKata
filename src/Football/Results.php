<?php declare(strict_types=1);

namespace App\Football;

use Closure;

final readonly class Results
{
    /**
     * @var Team[]
     */
    private array $dataLines;

    public function __construct(Team ...$team)
    {
        $this->dataLines = $team;
    }

    public function reduce(Closure $reduceFunction)
    {
        return array_reduce($this->dataLines, $reduceFunction);
    }

}