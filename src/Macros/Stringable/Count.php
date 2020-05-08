<?php declare(strict_types = 1);

namespace Elevate\Macros\Stringable;

use Illuminate\Support\Stringable;

class Count
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Stringable::macro('count', fn($search) => mb_substr_count($this->__toString(), $search));
    }
}
