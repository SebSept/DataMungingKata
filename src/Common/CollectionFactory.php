<?php

namespace App\Common;

use Closure;

abstract class CollectionFactory
{
    public const string SEPARATOR = ' ';

    public function __construct(
        private readonly Closure $filterDataLines,
        private readonly Closure $itemInstanciation,
        private readonly string  $className,
    )
    {
    }

    public function fromFile(string $filePath)
    {
        $fileStream = fopen($filePath, 'r');
        $lines = [];
        while ($CSVLine = fgetcsv($fileStream, separator: self::SEPARATOR, escape: '')) {
            $lines[] = $CSVLine;
        }

        return $this->fromArray($lines);
    }

    private function fromArray(array $lines): Collection
    {
        $lines = array_filter($this->removeEmptyFields($lines), $this->filterDataLines);

        return new Collection(
            array_map($this->itemInstanciation, $lines),
            $this->className
        );
    }

    public function removeEmptyFields(array $lines): array
    {
        // remove empty fields on each line
        $lines = array_map(array_filter(...), $lines);
        // and reset array keys
        return array_map(array_values(...), $lines);
    }

}