<?php

namespace App\Common;

use App\Football\Team;
use Closure;

/**
 * @template T
 */
readonly abstract class Collection
{
    /**
     * @var T[]
     */
    private array $items;

    /**
     * @param $items
     * @param class-string<T> $className
     */
    public function __construct($items, string $className)
    {
        array_walk($items, fn($item) => assert($item instanceof $className));

        $this->items = $items;
    }

    /**
     * @template TReturn
     * @param Closure(T $item, T $carry): TReturn $reduceFunction
     * @return TReturn
     */
    public function reduce(Closure $reduceFunction): mixed
    {
        return array_reduce($this->items, $reduceFunction);
    }
}