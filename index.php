<?php declare(strict_types=1);

use App\Common\CollectionFactory;
use App\Football\Munging as FootballMunging;
use App\Temperature\Munging;
use App\Temperature\DayCollectionFactory;
use App\Football\TeamCollectionFactory;

require_once 'vendor/autoload.php';
$days = (new DayCollectionFactory())->fromFile(__DIR__ . '/data/weather.dat');
$processor = new Munging($days);
echo "jour avec le plus petit écart min-max : " . $processor->minimalTemperatureSpreadDay();

echo PHP_EOL.PHP_EOL;
$teams = (new TeamCollectionFactory())->fromFile(__DIR__ . '/data/football.dat');
$processor = new FootballMunging($teams);
$team = $processor->teamWithBestGoalAverage();
echo "Equipe avec le meilleur écart de but marqués/encaissés " . $team->name . " écart : " . $team->goalAverage();