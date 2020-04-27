<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Get
{

    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('get', fn () => $this->__toString());
    }
}
