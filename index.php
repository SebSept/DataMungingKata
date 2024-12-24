<?php declare(strict_types=1);

use App\Temperature\Munging;
use App\Temperature\DataTableFactory;

require_once 'vendor/autoload.php';

$processor = new Munging(DataTableFactory::fromFile(__DIR__ . '/data/weather.dat'));
echo "jour avec le plus petit écart min-max : " . $processor->minimalTemperatureSpreadDay();
/*
$processor = new GoalMunging(FootbollResultsFactory::fromFile(__DIR__ . '/data/goal.dat'));
$team = $processor->minimalGoalSpreadTeam();
echo "Equipe avec le meilleur écart de but marqués/encaissés ".$team->name." écart : ".$team->goalAverage();*/