<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class ToArray
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('toArray', fn () => str_split($this->__toString()));
    }
}
