<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class SectionBy
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('sectionBy', function($key, $preserveKeys = false, $sectionKey = 0, $itemsKey = 1) {
            $sectionNameRetriever = $this->valueRetriever($key);

            $results = new Collection();

            foreach ($this->items as $key => $value) {
                $sectionName = $sectionNameRetriever($value);

                if (! $results->last() || $results->last()->get($sectionKey) !== $sectionName) {
                    $results->push(new Collection([
                        $sectionKey => $sectionName,
                        $itemsKey => new Collection(),
                    ]));
                }

                $results->last()->get($itemsKey)->offsetSet($preserveKeys ? $key : null, $value);
            }

            return $results;
        });
    }
}
