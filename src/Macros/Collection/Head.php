<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Head
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('head', fn () => $this->first());
    }
}
