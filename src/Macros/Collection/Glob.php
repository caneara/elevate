<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Glob
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('glob', fn ($pattern, $flags = 0) => Collection::make(glob($pattern, $flags)));
    }
}
