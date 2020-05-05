<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class Trim
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('trim', fn() => $this->map(fn($value) => trim($value)));
    }
}
