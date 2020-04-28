<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Sixth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('sixth', fn () => $this->get(5));
    }
}
