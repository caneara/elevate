<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Seventh
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('seventh', fn () => $this->get(6));
    }
}
