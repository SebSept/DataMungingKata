<?php declare(strict_types=1);

namespace App\Temperature;

final class DataTableFactory
{
    public const string SEPARATOR = ' ';

    public static function fromArray(array $data): DataTable
    {
        // remove empty fields
        $dataLines = array_map(array_filter(...), $data);
        $dataLines = array_map(array_values(...), $dataLines);

        // keep only day data lines
        // - at least 3 fields
        $dataLines = array_filter($dataLines, fn(array $line): bool => count($line) >= 3);
        // - first number between 1 and 30
        $number_between_1_and_30 = fn($col): bool => preg_match('/[1-3]?\d/', (string) $col ) === 1;
        $dataLines = array_filter($dataLines,
            fn(array $line): bool => $number_between_1_and_30($line[0])
        );

        return new DataTable(
            ...array_map(
                fn(array $dataLine): DataLine =>
                    //                    var_dump($dataLine);
                    new DataLine((int)$dataLine[0], $dataLine[1], $dataLine[2]),
        $dataLines)
        );
    }

    public static function fromFile(string $filePath): DataTable
    {
        $fileStream = fopen($filePath, 'r');
        $lines = [];
        while($CSVLine = fgetcsv($fileStream, separator: self::SEPARATOR, escape: '')) {
            $lines[] = $CSVLine;
        }

        return self::fromArray($lines);
    }

}