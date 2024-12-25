<?php
declare(strict_types=1);

namespace App\Football;

/**
 * @see http://codekata.com/kata/kata04-data-munging/
 */
readonly class Munging
{
    public function __construct(
        private ResultsCollection $results)
    {
    }

    public function teamWithBestGoalAverage(): Team
    {
        return $this->results->reduce(
            fn(?Team $teamWithBestGoalAverage, Team $team): Team => is_null($teamWithBestGoalAverage) || $team->goalAverage() > $teamWithBestGoalAverage->goalAverage()
                ? $team
                : $teamWithBestGoalAverage);
    }
}
