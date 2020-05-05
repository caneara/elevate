<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class GroupByModel
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('groupByModel', function($callback, $preserveKeys = false, $modelKey = 0, $itemsKey = 1) {
            $callback = $this->valueRetriever($callback);

            return $this->groupBy(function($item) use ($callback) {
                return $callback($item)->getKey();
            }, $preserveKeys)->map(function($items) use ($callback, $modelKey, $itemsKey) {
                return [
                    $modelKey => $callback($items->first()),
                    $itemsKey => $items,
                ];
            })->values();
        });
    }
}
