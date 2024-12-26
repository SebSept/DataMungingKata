<?php declare(strict_types=1);

namespace App\Common;

use Closure;
use InvalidArgumentException;

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
     * @param T[] $items
     * @param class-string<T> $className
     */
    public function __construct(array $items, string $className)
    {
        array_walk($items, fn($item): bool => assert($item instanceof $className, 'item expected to be an instance of ' . $className.' but it is '.(get_debug_type($item))));

        $this->items = $items;
    }

    /**
     * @param Closure(null|T $carry, T $item): T $reduceFunction
     * @return T
     */
    public function reduce(Closure $reduceFunction)
    {
        assert($this->items !== []);

        $result = array_reduce($this->items, $reduceFunction);
        if(is_null($result)) {
            throw new InvalidArgumentException('Reduce closure should never return null (note that items is never empty when closure runs)');
        }

        return $result;
    }
}