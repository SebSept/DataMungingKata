<?php declare(strict_types=1);

namespace App\Football;

readonly class Team
{
    public function __construct(
        public string $name,
        public int $for,
        public int $against,
    )
    {

    }

    public function goalAverage(): int
    {
        return $this->for - $this->against;
    }

}