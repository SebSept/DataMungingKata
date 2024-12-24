<?php declare(strict_types=1);

namespace App;

use Closure;

final readonly class WeatherDataTable
{
    /**
     * @var WeatherDataLine[]
     */
    private array $dataLines;

    public function __construct(WeatherDataLine ...$weatherDataLine)
    {
        $this->dataLines = $weatherDataLine;
    }

    public function reduce(Closure $reduceFunction)
    {
        return array_reduce($this->dataLines, $reduceFunction);
    }

}