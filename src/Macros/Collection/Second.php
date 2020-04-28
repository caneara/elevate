<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Second
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('second', fn () => $this->get(1));
    }
}
