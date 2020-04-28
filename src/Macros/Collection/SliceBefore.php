<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class SliceBefore
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('sliceBefore', function ($callback, $preserveKeys = false) {
            if ($this->isEmpty()) {
                return new Collection();
            }

            if (! $preserveKeys) {
                $sliced = new Collection([
                    new Collection([$this->first()]),
                ]);

                return $this->eachCons(2)->reduce(function ($sliced, $previousAndCurrent) use ($callback) {
                    [$previousItem, $item] = $previousAndCurrent;

                    $callback($item, $previousItem)
                        ? $sliced->push(new Collection([$item]))
                        : $sliced->last()->push($item);

                    return $sliced;
                }, $sliced);
            }

            $sliced = new Collection([$this->take(1)]);

            return $this->eachCons(2, $preserveKeys)->reduce(function ($sliced, $previousAndCurrent) use ($callback) {
                $previousItem = $previousAndCurrent->take(1);
                $item = $previousAndCurrent->take(-1);

                $itemKey = $item->keys()->first();
                $valuesItem = $item->first();
                $valuesPreviousItem = $previousItem->first();

                $callback($valuesItem, $valuesPreviousItem)
                    ? $sliced->push($item)
                    : $sliced->last()->put($itemKey, $valuesItem);

                return $sliced;
            }, $sliced);
        });
    }
}
