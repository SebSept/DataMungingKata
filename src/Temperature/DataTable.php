<?php declare(strict_types=1);

namespace App\Temperature;

use Closure;

final readonly class DataTable
{
    /**
     * @var DataLine[]
     */
    private array $dataLines;

    public function __construct(DataLine ...$weatherDataLine)
    {
        $this->dataLines = $weatherDataLine;
    }

    public function reduce(Closure $reduceFunction)
    {
        return array_reduce($this->dataLines, $reduceFunction);
    }

}