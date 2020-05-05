<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class Carbonize
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro(
            'carbonize',
            fn()                                 =>
            collect($this->items)->map(fn($time) => new CarbonImmutable($time))
        );
    }
}
