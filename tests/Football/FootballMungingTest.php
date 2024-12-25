<?php

namespace App\Tests\Football;

use App\Football\FootballResultsFactory;
use App\Football\Munging;
use PHPUnit\Framework\TestCase;

class FootballMungingTest extends TestCase
{

    public function testTeamWithBestGoalAverage(): void
    {
        $footballResultsFactory = new FootballResultsFactory();
        $dataMunging = new Munging($footballResultsFactory->fromFile(__DIR__ . '/stubs/football.dat'));

        $this->assertSame('Arsenal', $dataMunging->teamWithBestGoalAverage()->name);
        $this->assertSame(79, $dataMunging->teamWithBestGoalAverage()->for);
        $this->assertSame(36, $dataMunging->teamWithBestGoalAverage()->against);
        $this->assertSame(43, $dataMunging->teamWithBestGoalAverage()->goalAverage());
    }

    public function testTeamWithBestGoalAverage2(): void
    {
        $footballResultsFactory = new FootballResultsFactory();
        $dataMunging = new Munging($footballResultsFactory->fromFile(__DIR__ . '/stubs/football2.dat'));

        $this->assertSame('Arsenal', $dataMunging->teamWithBestGoalAverage()->name);
        $this->assertSame(80, $dataMunging->teamWithBestGoalAverage()->for);
        $this->assertSame(30, $dataMunging->teamWithBestGoalAverage()->against);
        $this->assertSame(50, $dataMunging->teamWithBestGoalAverage()->goalAverage());
    }
}
