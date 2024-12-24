<?php declare(strict_types=1);

namespace App\Temperature;

use InvalidArgumentException;

readonly class DataLine
{
    public int $maxTemperature;

    public int $minTemperature;

    public function __construct(
        public int    $day,
        string|int $maxTemperature,
        string|int $minTemperature,
    )
    {
        $this->minTemperature = $this->setTemperature((string) $minTemperature);
        $this->maxTemperature = $this->setTemperature((string) $maxTemperature);
        if($this->minTemperature > $this->maxTemperature){
            throw new InvalidArgumentException("Minimum temperature can't be greater than the maximum temperature");
        }
    }

    public function spread(): int
    {
        return $this->maxTemperature - $this->minTemperature;
    }

    private function setTemperature(string $temperature): int
    {
        $regexp = "/^(-?\d+)\*?$/";
        if (in_array(preg_match($regexp, $temperature, $matches), [0, false], true)) {
            throw new InvalidArgumentException(sprintf("'%s' is an invalid temperature format, use %s : possibly minus, numbers, possibly an *.", $temperature, $regexp));
        }

        return (int) $matches[1];
    }

}