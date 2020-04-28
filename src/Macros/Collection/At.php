<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class At
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('at', fn ($index) => $this->slice($index, 1)->first());
    }
}
