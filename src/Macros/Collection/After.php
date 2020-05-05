<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class After
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('after', function($currentItem, $fallback = null) {
            $currentKey = $this->search($currentItem, true);

            if ($currentKey === false) {
                return $fallback;
            }

            $currentOffset = $this->keys()->search($currentKey, true);

            $next = $this->slice($currentOffset, 2);

            if ($next->count() < 2) {
                return $fallback;
            }

            return $next->last();
        });
    }
}
