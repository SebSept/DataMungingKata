<?php declare(strict_types=1);

use App\Football\Munging as FootballMunging;
use App\Temperature\Munging;
use App\Temperature\DataTableFactory;
use App\Football\FootballResultsFactory;

require_once 'vendor/autoload.php';

$processor = new Munging(DataTableFactory::fromFile(__DIR__ . '/data/weather.dat'));
echo "jour avec le plus petit écart min-max : " . $processor->minimalTemperatureSpreadDay();

echo PHP_EOL.PHP_EOL;
$processor = new FootballMunging(FootballResultsFactory::fromFile(__DIR__ . '/data/football.dat'));
$team = $processor->teamWithBestGoalAverage();
echo "Equipe avec le meilleur écart de but marqués/encaissés " . $team->name . " écart : " . $team->goalAverage();