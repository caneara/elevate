<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class FilterMap
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('filterMap', fn ($callback) => $this->map($callback)->filter());
    }
}
