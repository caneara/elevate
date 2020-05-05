<?php declare(strict_types = 1);

namespace Elevate\Macros\Collection;

use Illuminate\Support\Collection;

class PluckToArray
{
    /**
     * Register the macro.
     *
     **/
    public static function register() : void
    {
        Collection::macro('pluckToArray', fn($value, $key = null) => $this->pluck($value, $key)->toArray());
    }
}
