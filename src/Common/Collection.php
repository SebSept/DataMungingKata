<?php

namespace App\Common;

use Closure;

/**
 * @template T
 */
readonly class Collection
{
    /**
     * @var T[]
     */
    private array $items;

    /**
     * @param $items
     * @param class-string<T> $className
     */
    public function __construct(array $items, string $className)
    {
        array_walk($items, fn($item): bool => assert($item instanceof $className, 'item expected to be an instance of ' . $className.' but it is '.$item::class));

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