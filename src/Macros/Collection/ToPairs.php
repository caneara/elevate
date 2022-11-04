<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class ToPairs
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('toPairs', fn () => $this->keys()->map(fn ($key) => [$key, $this->items[$key]]));
    }
}
