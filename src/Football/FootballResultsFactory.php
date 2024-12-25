<?php declare(strict_types=1);

namespace App\Football;

final class FootballResultsFactory
{
    public const string SEPARATOR = ' ';

    public static function fromArray(array $data): ResultsCollection
    {
        $dataLines = self::removeNonDataLines($data);

        return new ResultsCollection(
            array_map(
                fn(array $dataLine): Team => new Team($dataLine[1], (int)$dataLine[6], (int)$dataLine[8]),
                $dataLines),
            Team::class
        );
    }

    public static function fromFile(string $filePath): ResultsCollection
    {
        $fileStream = fopen($filePath, 'r');
        $lines = [];
        while ($CSVLine = fgetcsv($fileStream, separator: self::SEPARATOR, escape: '')) {
            $lines[] = $CSVLine;
        }

        return self::fromArray($lines);
    }

    public static function removeNonDataLines(array $data): array
    {
        // remove empty fields
        $dataLines = array_map(array_filter(...), $data);
        // reset array keys
        $dataLines = array_map(array_values(...), $dataLines);

        // keep only day data lines
        // - 10 fields
        return array_filter($dataLines, fn(array $line): bool => count($line) === 10);
    }

}