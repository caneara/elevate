<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Countable;
use LengthException;
use Illuminate\Support\Collection;

class Transpose
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('transpose', function() {
            if ($this->isEmpty()) {
                return new Collection();
            }

            $firstItem = $this->first();

            $expectedLength = is_array($firstItem) || $firstItem instanceof Countable ? count($firstItem) : 0;

            array_walk($this->items, function ($row) use ($expectedLength) {
                if ((is_array($row) || $row instanceof Countable) && count($row) !== $expectedLength) {
                    throw new LengthException("Element's length must be equal.");
                }
            });

            $items = array_map(function (...$items) {
                return new Collection($items);
            }, ...array_map(function ($items) {
                return $this->getArrayableItems($items);
            }, array_values($this->items)));

            return new Collection($items);
        });
    }
}
