<?php declare(strict_types=1);

namespace App\Common;

use Closure;

/**
 * @template T
 */
abstract class CollectionFactory
{
    public const string SEPARATOR = ' ';

    public function __construct(
        private readonly Closure $filterDataLines,
        private readonly Closure $itemInstanciation,
    )
    {
    }

    public function fromFile(string $filePath): CollectionInterface
    {
        $fileStream = fopen($filePath, 'r');
        assert(is_resource($fileStream), 'failed to open ' . $filePath);
        $lines = [];
        while ($CSVLine = fgetcsv($fileStream, separator: self::SEPARATOR, escape: '')) {
            $lines[] = $CSVLine;
        }

        return $this->fromArray($lines);
    }

    /**
     * @param array<int, array<int, string>> $lines
     */
    private function fromArray(array $lines): CollectionInterface
    {
        $lines = array_filter($this->removeEmptyFields($lines), $this->filterDataLines);

        return $this->createCollection(
            array_map($this->itemInstanciation, $lines),
        );
    }

    /**
     * @param array<int, array<int, string>> $lines
     * @return array<int, array<int, string>>
     */
    private function removeEmptyFields(array $lines): array
    {
        // remove empty fields on each line
        $lines = array_map(array_filter(...), $lines);
        // and reset array keys
        return array_map(array_values(...), $lines);
    }

    /**
     * @param T[] $items
     */
    abstract protected function createCollection(array $items): CollectionInterface;

}