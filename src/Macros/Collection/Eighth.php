<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Eighth
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('eighth', fn() => $this->get(7));
    }
}
